<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos_xs.css">
    <!--movil-->
    <link rel="stylesheet" media=" all and (min-device-width : 768px) and (max-device-width : 991px)" href="css/estilos_sm.css">
    <!--IPAD vertical-->
    <link rel="stylesheet" media=" all and (min-device-width : 992px) and (max-device-width : 1199px) " href="css/estilos_md.css">
    <!--IPAD horizontal-->
    <link rel="stylesheet" media=" all and (min-device-width : 1200px)" href="css/estilos_lg.css">
    <!--monitor paronamico-->

    <title>Quienes Somos</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <main>
        <section>
            <div id="tagDivMapa" class="mapa"></div>
            <div id="tagDivPanorama"></div>
        </section>
    </main>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfulz2jpJ3DGJQRHy-cpOjARGoGIUSLY8&callback=initMap">
    </script>

    <script type="text/javascript">
        function initMap() {
            //Ponemos el mapa
            var coord = {
                lat: 37.667544,
                lng: -1.701064
            };

            var map = new google.maps.Map(document.getElementById('tagDivMapa'), {
                zoom: 16,
                center: coord
            });

            //crear el marcador
            var marker = new google.maps.Marker({
                position: coord,
                map: map
            });

            //creamos el cuadrado pequeño
            let panorama = new google.maps.StreetViewPanorama(
                tagDivPanorama, {
                    position: coord,
                    // pov: {
                    //     heading: 150,
                    //     pitch: 10
                    // }
                }
            );
        }
    </script>
    <?php
    include 'footer.php';
    ?>
</body>

</html>