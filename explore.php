<?php include_once ('header.php')?>
<style type="text/css">
    body{
        background-color: rgba(0,0,0,0.69);
    }
</style>
<div class="container world_map_container">
    <div id="world-map"></div>
    <script>
        $(function(){
            mapStyle = {
                initial: {
                    fill: '#0296AE',
                    "fill-opacity": 1,
                    stroke: 'none',
                    "stroke-width": 0,
                    "stroke-opacity": 1
                },
                hover: {
                    "fill-opacity": 0.8,
                    cursor: 'pointer'
                },
                selected: {
                    fill: 'yellow'
                },
                selectedHover: {
                }
            };

            onRegionClickevent = function (event, code) {
                var map = $('#world-map').vectorMap('get', 'mapObject');
                //var name = map.getRegionName(code);
                window.location.href = "country.php?regionCode=" + code;
            };

            $('#world-map').vectorMap({map: 'world_mill', regionStyle: mapStyle, onRegionClick: onRegionClickevent});
        });
    </script>
</div>
</body>
<?php include_once ('footer.php')?>

</html>