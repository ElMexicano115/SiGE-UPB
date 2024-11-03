<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//Modelos a usar
use App\Models\Organizacion;
use App\Models\Role;
use App\Models\Registro;
//Complemento para guardar archivos
use Illuminate\Support\Facades\Storage;
//Endroid QR
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
//DomPDF
use Barryvdh\DomPDF\Facade\Pdf;

class RegistroController extends Controller
{
    //Función para crear el registro y generar el gafete
    public function registrarUsuario(Request $request)
    {
        // Verificar si el correo electrónico ya está registrado
        $existingUser = Registro::where('email', $request->correo)->first();

        if ($existingUser) {
            // Si el correo electrónico ya está registrado, redirigir con un mensaje de error
            return redirect()->back()->with('error', 'El correo electrónico que ingresó ya ha sido registrado, intente con uno diferente.');
        }

        // Inicializamos variables para mesa y tema en caso de que sean necesarios más adelante
        $mesa = null;
        $tema = null;

        // Guardar imagen en la carpeta storage/img (opcional)
        $imagenUrl = null;
        if ($request->hasFile('foto')) {
            // Obtener la instancia del archivo
            $imagen = $request->file('foto');
            // Generar un nombre único para la imagen
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            // Guardar la imagen en la carpeta public/storage/img
            $imagen->move(public_path('storage/img'), $nombreImagen);
            // Guardar la URL de la imagen en la base de datos
            $imagenUrl = 'storage/img/' . $nombreImagen;
        }

        // Crear folio único
        $folio = '24-' . str_pad($request->organizacion, 3, '0', STR_PAD_LEFT) . '-' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);

        // Crear código QR
        $writer = new PngWriter();
        $qrUrl = null;
        try {
            // Crear el código QR con el valor del folio
            $qrCode = QrCode::create($folio)
                ->setSize(300) // Tamaño del código QR
                ->setMargin(10); // Margen

            // Definir la ruta para guardar el QR
            $qrPath = 'storage/qr-codes/' . $folio . '_qr.png';

            // Crear el directorio de destino si no existe
            $qrDirectory = dirname(public_path($qrPath));
            if (!file_exists($qrDirectory)) {
                mkdir($qrDirectory, 0777, true);
            }

            // Generar el código QR como una imagen PNG
            $result = $writer->write($qrCode);
            file_put_contents(public_path($qrPath), $result->getString());

            // Obtener la URL del código QR
            $qrUrl = 'storage/qr-codes/' . $folio . '_qr.png';
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Error al generar el código QR: ' . $e->getMessage());
        }

        // Asignar mesa o tema en función del rol seleccionado
        if ($request->flexRadioRole == 2) {
            $tema = $request->topic;
        } elseif ($request->flexRadioRole == 3) {
            $mesa = $request->mesa;
        }

        // Crear el registro en la base de datos
        $registro = Registro::create([
            'nombre' => $request->nombre,
            'apellidoPaterno' => $request->apellido_p,
            'apellidoMaterno' => $request->apellido_m,
            'email' => $request->correo,
            'telefono' => $request->numero,
            'rol' => $request->flexRadioRole,
            'organizacion' => $request->organizacion,
            'imagen' => $imagenUrl,
            'folio' => $folio,
            'qr' => $qrUrl,
            'mesa' => $mesa,
            'tema' => $tema,
        ]);

        $pdf = Pdf::loadView('gafete.designG', compact('registro'))->save(public_path('storage/pdfs/' . $registro->id . '.pdf'));
        return $pdf->download('Gafete.pdf');
    }
}
