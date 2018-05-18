<!DOCTYPE html>

<html lang="es-ES">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>¡Hay alguien interesado en tu <b>{{ $titulo }}</b>! Te ha dejado un mensaje:</h2>

    <div>
      <p>Hola, soy <b>{{ $nombre_remitente }}</b>,</p>

      <hr>

      <p>{{ $mensaje_remitente }}

      <hr>

      <p>Mi número es: <b>{{ $numero_remitente }}</b></p>
      
      <p> Gracias de antemano, espero tu respuesta.</p>
      <br>
      <small>ATENCIÓN. El remitente de este correo es la web y no el interesado en tu anuncio. Por favor, no respondas a este correo. Gracias.</small>
    </div>
  </body>
</html>