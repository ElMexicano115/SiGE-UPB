<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// Modelos a usar
use App\Models\Organizacion;
use App\Models\Role;
use App\Models\Registro;
// Complemento para guardar archivos
use Illuminate\Support\Facades\Storage;
// Endroid QR
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
// DomPDF
use Barryvdh\DomPDF\Facade\Pdf;

class RegistroController extends Controller
{
    // Función para crear el registro y generar el gafete
    public function registrarUsuario(Request $request)
    {
        // Verificar si el correo electrónico ya está registrado
        $existingUser = Registro::where('email', $request->correo)->first();

        if ($existingUser) {
            // Si el correo electrónico ya está registrado, redirigir con un mensaje de error
            return redirect()->back()->with('error', 'El correo electrónico que ingresó ya ha sido registrado, intente con uno diferente.');
        }

        // ID del evento (por ahora es fijo, luego se puede recibir como parámetro)
        $eventoId = 2;

        // Inicializamos variables para mesa y tema en caso de que sean necesarios más adelante
        $mesa = null;
        $tema = null;

        // Crear folio único
        $folio = '24-' . str_pad($request->organizacion, 3, '0', STR_PAD_LEFT) . '-' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);

        // Crear registro en la base de datos
        $registro = Registro::create([
            'nombre' => $request->nombre,
            'apellidoPaterno' => $request->apellido_p,
            'apellidoMaterno' => $request->apellido_m,
            'email' => $request->correo,
            'telefono' => $request->numero,
            'rol' => $request->flexRadioRole,
            'organizacion' => $request->organizacion,
            'folio' => $folio,
            'mesa' => $mesa,
            'tema' => $tema,
        ]);

        // Ruta base del evento y del usuario
        $basePath = "storage/eventos/$eventoId/usuarios/{$registro->nombre}-{$registro->id}";

        // Crear carpeta del usuario dentro del evento
        Storage::makeDirectory($basePath);

        // Guardar la foto del usuario (si fue proporcionada)
        $imagenUrl = null;
        if ($request->hasFile('foto')) {
            $imagen = $request->file('foto');
            $nombreImagen = 'foto_' . time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path($basePath), $nombreImagen);
            $imagenUrl = "$basePath/$nombreImagen";
        }

        // Generar código QR
        $writer = new PngWriter();
        $qrUrl = null;
        try {
            $qrCode = QrCode::create($folio)->setSize(300)->setMargin(10);
            $qrPath = "$basePath/{$folio}_qr.png";
            $result = $writer->write($qrCode);
            file_put_contents(public_path($qrPath), $result->getString());
            $qrUrl = $qrPath;
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Error al generar el código QR: ' . $e->getMessage());
        }

        // Asignar mesa o tema en función del rol seleccionado
        if ($request->flexRadioRole == 2) {
            $tema = $request->topic;
        } elseif ($request->flexRadioRole == 3) {
            $mesa = $request->mesa;
        }

        // Actualizar los campos de imagen y QR en el registro de la base de datos
        $registro->update([
            'imagen' => $imagenUrl,
            'qr' => $qrUrl,
            'mesa' => $mesa,
            'tema' => $tema,
        ]);

        // Generar el PDF del gafete y guardarlo en la carpeta del usuario
        $pdf = Pdf::loadView('gafete.designG', compact('registro'))->save(public_path("$basePath/{$registro->id}_gafete.pdf"));
        return $pdf->download('Gafete.pdf');
    }
}