<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      text-align: center;
      position: relative;
    }

    h3, h2, h4 {
      font-weight: normal;
    }

    h3 { margin: 0.5rem 0; }

    .mb-2 { margin-bottom: 2rem; }
    .mb-4 { margin-bottom: 4rem; }
    .mb-0 { margin-bottom: 0; }
    .mt-0 { margin-top: 0; }

    .assinatura {
      height: 110px;
      text-align: center;
    }

    .linha {
      border-top: 1px solid black;
      width: 320px;
      margin: 0 auto;
    }

    .abenepi {
      height: 150px;
      text-align: center;
    }

    .crianca-esquerda, .crianca-direita {
      position: absolute;
      height: 400px;
      width: 200px;
      top: 285px;
    }

    .crianca-esquerda {    
      left: 0px;
    }

    .crianca-direita {    
      right: 0px;
    }
  </style>
</head>

<body>
	<h1>V SIMPÓSIO DE TRANSTORNOS NEUROPSIQUIÁTRICOS</h1>
  <h1 class="mb-2">DA INFÂNCIA E DA ADOLESCÊNCIA</h1>

  <h3>Certifico que <b>{{ $nome }}</b></h3>
  <h3>realizou o V Simpósio de Transtornos</h3>
  <h3>Neuropsiquiátricos da Infância e da Adolescência,</h3>
  <h3>realizado no dia 18 de Maio de 2019, das 8h às 18h</h3>
  <h3>no Hotel Nacional Inn , promovido pelo</h3>
  <h3>Núcleo São Carlos da ABENEPI.</h3>
  <h3>Carga horária: 10 horas</h3>

  <img class="assinatura" src="https://res.cloudinary.com/tesseract/image/upload/v1556656463/abenepi-2019/assinatura.jpg">
  <div class="linha"></div>
  <h2 class="mb-0">Drª Tais de Lima Ferreira Mattar</h2>
  <h4 class="mt-0">Coordenadora do Núcleo São Carlos da ABENEPI</h4>

  <img class="abenepi" src="https://res.cloudinary.com/tesseract/image/upload/v1550819581/abenepi-2019/abenepi.png">

  <img class="crianca-esquerda" src="https://res.cloudinary.com/tesseract/image/upload/v1550613610/abenepi-2019/crianca-esquerda.png">
  <img class="crianca-direita" src="https://res.cloudinary.com/tesseract/image/upload/v1550613608/abenepi-2019/crianca-direita.png">
</body>
</html>
