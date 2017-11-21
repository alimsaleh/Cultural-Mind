/**
 * Created by jaspinder on 11/20/17.
 */
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
        var name = map.getRegionName(code);
        window.location.href = "country.php?regionCode=" + name;
    };

    $('#world-map').vectorMap({map: 'world_mill', regionStyle: mapStyle, onRegionClick: onRegionClickevent});
});
</script>