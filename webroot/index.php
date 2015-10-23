<!DOCTYPE html>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<style>
            #map-canvas {
            height: 50vh;
            margin: 0px;
            padding: 0px;
          }
            .ui-autocomplete {
              position: absolute;
              top: 100%;
              left: 0;
              z-index: 1000;
              float: left;
              display: none;
              min-width: 160px;
              _width: 160px;
              padding: 4px 0;
              margin: 2px 0 0 0;
              list-style: none;
              background-color: #ffffff;
              border-color: #ccc;
              border-color: rgba(0, 0, 0, 0.2);
              border-style: solid;
              border-width: 1px;
              -webkit-border-radius: 5px;
              -moz-border-radius: 5px;
              border-radius: 5px;
              -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
              -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
              box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
              -webkit-background-clip: padding-box;
              -moz-background-clip: padding;
              background-clip: padding-box;
              *border-right-width: 2px;
              *border-bottom-width: 2px;

              .ui-menu-item > a.ui-corner-all {
                display: block;
                padding: 3px 15px;
                clear: both;
                font-weight: normal;
                line-height: 18px;
                color: #555555;
                white-space: nowrap;

                &.ui-state-hover, &.ui-state-active {
                  color: #ffffff;
                  text-decoration: none;
                  background-color: #0088cc;
                  border-radius: 0px;
                  -webkit-border-radius: 0px;
                  -moz-border-radius: 0px;
                  background-image: none;
                }
              }
            }
            
            .label {
              box-sizing:border-box;
              background: #0080FF;
              box-shadow: 2px 2px 4px #333;
              border:2px solid #F2F2F2;
              height: 15px;
              width: 15px;
              border-radius: 10px;
            }
		</style>
        
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="https://google-maps-utility-library-v3.googlecode.com/svn-history/r391/trunk/markerwithlabel/src/markerwithlabel.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <script>
        var availabletags = [
            "Abies amabilis Pacific silver fir","Abies balsamea	balsam fir","Abies bracteata	bristlecone fir","Abies concolor	white fir","Abies fraseri	Fraser fir","Abies grandis	grand fir","Abies lasiocarpa subalpine fir","Abies magnifica	California red fir","Abies procera	noble fir","Acacia constricta	whitethorn acacia","Acacia greggii	catclaw acacia","Acer circinatum	vine maple","Acer glabrum Rocky Mountain maple","Acer grandidentatum	bigtooth maple","Acer macrophyllum	bigleaf maple","Acer negundo	boxelder","Acer pensylvanicum	striped maple","Acer platanoides	Norway maple","Acer rubrum	red maple","Acer saccharum	sugar maple","Acer saccharinum	silver maple","Acer spicatum	mountain maple","Aesculus californica	California buckeye","Ailanthus altissima tree-of-heaven","Albizia julibrissin	mimosa","Alnus incana	gray alder","Alnus incana subsp. rugosa	speckled alder","Alnus incana subsp. tenuifolia	thinleaf alder","Alnus rhombifolia	white alder","Alnus rubra	red alder","Alnus viridis subsp. crispa	mountain alder","Alnus viridis subsp. sinuata	Sitka alder","Amelanchier alnifolia	Saskatoon serviceberry","Amelanchier arborea	downy serviceberry","Aralia spinosa	Devil's walking stick","Arbutus arizonica	Arizona madrone","Arbutus menziesii	Pacific madrone","Arbutus xalapensis	Texas madrone","Asimina triloba pawpaw","Betula alleghaniensis	yellow birch","Betula nigra	river birch","Betula occidentalis	water birch","Betula papyrifera	paper birch","Betula populifolia	gray birch","Calocedrus decurrens incense-cedar","Carpinus caroliniana	American hornbeam","Carya cordiformis	bitternut hickory","Carya glabra	pignut hickory","Carya illinoinensis	pecan","Carya ovata	shagbark hickory","Carya tomentosa	mockernut hickory","Castanea pumila	Allegheny chinkapin","Casuarina cunninghamiana	river sheoak","Casuarina equisetifolia	Australian-pine","Casuarina glauca	gray sheoak","Celtis laevigata	sugarberry","Celtis occidentalis	common hackberry","Celtis reticulata	netleaf hackberry","Cephalanthus occidentalis	buttonbush","Cercis canadensis	eastern redbud","Cercis orbiculata California redbud","Cercocarpus ledifolius	curlleaf mountain-mahogany","Cercocarpus montanus	true mountain-mahogany","Chamaecyparis lawsoniana	Port-Orford-cedar","Chamaecyparis nootkatensis	Alaska-cedar","Chamaecyparis thyoides	Atlantic white-cedar","Chilopsis linearis	desert willow","Chrysolepis chrysophylla	giant chinquapin, scrub golden chinquapin","Cornus alternifolia	alternate-leaf dogwood","Corylus cornuta subsp. californica	California hazelnut","Cornus florida	flowering dogwood","Cornus nuttallii	Pacific dogwood","Cornus racemosa	gray dogwood","Crataegus douglasii	Douglas hawthorn","Cyrilla racemiflora	cyrilla","Diospyros texana	Texas persimmon","Diospyros virginiana	common persimmon","Elaeagnus angustifolia Russian-olive","Elaeagnus umbellata	autumn-olive","Eucalyptus globulus	bluegum eucalyptus","Fagus grandifolia	American beech","Frangula alnus	glossy buckthorn","Fraxinus americana	white ash","Fraxinus anomala	singleleaf ash","Fraxinus nigra	black ash","Fraxinus pennsylvanica	green ash","Fremontodendron californicum	flannelbush","Gleditsia triacanthos	honey-locust","Gordonia lasianthus	loblolly-bay","Hamamelis virginiana	witch-hazel","Hesperocyparis arizonica	Arizona cypress","Hesperocyparis bakeri	Baker cypress","Hesperocyparis forbesii Tecate cypress","Hesperocyparis goveniana	Gowen cypress","Hesperocyparis macrocarpa	Monterey cypress","Hesperocyparis macnabiana	MacNab cypress","Hesperocyparis sargentii	Sargent cypress","Ilex ambigua	Carolina holly","Ilex coriacea	large gallberry","Ilex decidua	deciduous holly","Ilex opaca	American holly","Ilex vomitoria	yaupon","Juglans californica	southern California walnut","Juglans cinerea	butternut","Juglans major	Arizona walnut","Juglans microcarpa	little walnut","Juglans nigra	black walnut","Juniperus ashei	Ashe juniper","Juniperus californica California juniper","Juniperus coahuilensis	redberry juniper","Juniperus communis	common juniper","Juniperus deppeana	alligator juniper","Juniperus flaccida	drooping juniper","Juniperus monosperma	oneseed juniper","Juniperus occidentalis	western juniper","Juniperus osteosperma	Utah juniper","Juniperus pinchotii	Pinchot juniper","Juniperus scopulorum	Rocky Mountain juniper","Juniperus virginiana	eastern redcedar","Larix decidua	European larch","Larix laricina	tamarack","Larix lyallii	alpine larch","Larix occidentalis	western larch","Ligustrum japonicum Japanese privet","Ligustrum sinense	Chinese privet","Liquidambar styraciflua	sweetgum","Liriodendron tulipifera	yellow-poplar","Lithocarpus densiflora	tanoak","Maclura pomifera	osage-orange","Magnolia grandiflora	southern magnolia","Magnolia virginiana	sweetbay","Melaleuca quinquenervia	melaleuca","Melia azedarach	chinaberry","Morus alba	white mulberry","Morus rubra	red mulberry","Myrica cerifera	wax-myrtle","Nyssa sylvatica	black tupelo","Ostrya knowltonii	Knowlton hophornbeam","Ostrya virginiana	eastern hophornbeam","Oxydendrum arboreum sourwood","Parkinsonia florida	blue paloverde","Parkinsonia microphylla	yellow paloverde","Paulownia tomentosa	princesstree","Persea borbonia	redbay","Picea abies	Norway spruce","Picea breweriana	Brewer spruce","Picea engelmannii	Engelmann spruce","Picea glauca	white spruce","Picea mariana	black spruce","Picea pungens	blue spruce","Picea rubens	red spruce","Picea sitchensis	Sitka spruce","Pinus albicaulis	whitebark pine","Pinus aristata	Rocky Mountain bristlecone pine","Pinus attenuata	knobcone pine","Pinus balfouriana	foxtail pine","Pinus banksiana	jack pine","Pinus cembroides	Mexican pinyon","Pinus clausa	sand pine","Pinus contorta var. contorta	shore pine","Pinus contorta var. latifolia	Rocky Mountain lodgepole pine","Pinus contorta var. murrayana	Sierra lodgepole pine","Pinus coulteri	Coulter pine","Pinus echinata	shortleaf pine","Pinus edulis	Colorado pinyon","Pinus elliottii	slash pine","Pinus elliottii var. elliottii	slash pine, typical variety","Pinus elliottii var. densa	South Florida slash pine","Pinus engelmannii	Apache pine","Pinus flexilis	limber pine","Pinus glabra	spruce pine","Pinus jeffreyi	Jeffrey pine","Pinus lambertiana	sugar pine","Pinus leiophylla var. chihuahuana	Chihuahua pine","Pinus longaeva	Great Basin bristlecone pine","Pinus monophylla	singleleaf pinyon","Pinus monticola	western white pine","Pinus muricata	bishop pine","Pinus nigra	European black pine","Pinus palustris	longleaf pine","Pinus ponderosa var. arizonica	Arizona pine","Pinus ponderosa var. ponderosa	Pacific ponderosa pine","Pinus ponderosa var. scopulorum	interior ponderosa pine","Pinus pungens	Table Mountain pine","Pinus quadrifolia	Parry pinyon","Pinus radiata	Monterey pine","Pinus resinosa red pine","Pinus rigida	pitch pine","Pinus sabiniana	gray pine","Pinus serotina	pond pine","Pinus strobiformis	southwestern white pine","Pinus strobus	eastern white pine","Pinus sylvestris	Scots pine","Pinus taeda	loblolly pine","Pinus torreyana	Torrey pine","Pinus virginiana	Virginia pine","Pinus washoensis	Washoe pine","Platanus occidentalis	sycamore","Populus angustifolia narrowleaf cottonwood","Populus alba	white poplar","Populus balsamifera subsp. balsamifera	balsam poplar","Populus balsamifera subsp. trichocarpa	black cottonwood","Populus canescens	gray poplar","Populus deltoides	eastern cottonwood","Populus fremontii	Fremont cottonwood","Populus grandidentata	bigtooth aspen","Populus heimburgeri	Heimburger's poplar","Populus rouleauiana	Roulwau's poplar","Populus tomentosa	Chinese white poplar","Populus tremuloides	quaking aspen","Prosopis glandulosa	honey mesquite","Prosopis pubescens	screwbean mesquite","Prosopis velutina	velvet mesquite","Prunus americana	American plum","Prunus emarginata	bitter cherry","Prunus fremontii	desert apricot","Prunus ilicifolia	hollyleaf cherry","Prunus pensylvanica	pin cherry","Prunus serotina	black cherry","Prunus virginiana	chokecherry","Pseudotsuga macrocarpa	bigcone Douglas-fir","Pseudotsuga menziesii var. glauca	Rocky Mountain Douglas-fir","Pseudotsuga menziesii var. menziesii	coast Douglas-fir","Purshia mexicana var. stansburiana	Stansbury cliffrose","Quercus agrifolia	coast live oak","Quercus alba	white oak","Quercus arizonica	Arizona white oak","Quercus berberidifolia	California scrub oak","Quercus bicolor	swamp white oak","Quercus chrysolepis	canyon live oak","Quercus coccinea	scarlet oak","Quercus douglasii	blue oak","Quercus ellipsoidalis	northern pin oak","Quercus emoryi	Emory oak","Quercus falcata	southern red oak","Quercus gambelii	Gambel oak","Quercus garryana Oregon white oak","Quercus grisea	gray oak","Quercus hemisphaerica	Darlington oak","Quercus ilicifolia	bear oak","Quercus incana	bluejack oak","Quercus kelloggii	California black oak","Quercus laevis	turkey oak","Quercus laurifolia	laurel oak","Quercus lobata	valley oak","Quercus lyrata	overcup oak","Quercus macrocarpa	bur oak","Quercus marilandica	blackjack oak","Quercus michauxii	swamp chestnut oak","Quercus muehlenbergii	chinkapin oak","Quercus nigra	water oak","Quercus oblongifolia	Mexican blue oak","Quercus pagoda	cherrybark oak","Quercus palustris	pin oak","Quercus phellos	willow oak","Quercus prinus	chestnut oak","Quercus pungens	sandpaper oak","Quercus rubra	northern red oak","Quercus shumardii	Shumard oak","Quercus stellata	post oak","Quercus turbinella	Sonoran scrub oak","Quercus velutina	black oak","Quercus virginiana	southern live oak","Quercus wislizenii	interior live oak","Rhamnus cathartica	common buckthorn","Rhamnus davurica	Dahurian buckthorn","Rhamnus purshiana	cascara","Rhododendron maximum	rosebay","Rhus copallinum	flameleaf sumac","Rhus glabra smooth sumac","Rhus typhina	staghorn sumac","Robinia neomexicana	New Mexico locust","Robinia pseudoacacia	black locust","Sabal palmetto	cabbage palmetto","Salix alaxensis	Alaska willow","Salix amygdaloides	peachleaf willow","Salix arbusculoides	littletree willow","Salix bebbiana	Bebb willow","Salix discolor pussy willow","Salix exigua	narrowleaf willow","Salix geyeriana	Geyer willow","Salix glauca	grayleaf willow","Salix gooddingii	Goodding willow","Salix lucida subsp. lasiandra	Pacific willow","Salix lutea	yellow willow","Salix nigra	black willow","Salix scouleriana	Scouler willow","Sambucus nigra subsp. cerulea	blue elderberry","Sambucus racemosa var. racemosa	red elderberry","Sapindus saponaria var. drummondii	western soapberry","Sassafras albidum	sassafras","Schefflera actinophylla	octopus tree","Schinus terebinthifolius	Brazilian pepper","Sequoiadendron giganteum	giant sequoia","Sequoia sempervirens redwood","Serenoa repens	saw-palmetto","Shepherdia argentea	silver buffaloberry","Sophora secundiflora	mescalbean sophora","Sorbus americana	American mountain-ash","Sorbus sitchensis Sitka mountain-ash","Spartium junceum	Spanish broom","Tamarix aphylla	Athel tamarisk","Tamarix chinesis	salt cedar","Tamarix gallica	French tamarisk","Tamarix parviflora	small-flowered tamarisk","Tamarix ramosissma	saltcedar","Taxus brevifolia	Pacific yew","Taxodium distichum	baldcypress","Taxus floridana	Florida yew","Taxodium mucronatum	Montezuma baldcypress","Thuja occidentalis	northern white-cedar","Thuja plicata	western redcedar","Tilia americana	basswood","Torreya californica	California torreya","Torreya taxifolia	Florida torreya","Triadica sebifera	tallowtree","Tsuga canadensis	eastern hemlock","Tsuga caroliniana	Carolina hemlock","Tsuga heterophylla	western hemlock","Tsuga mertensiana	mountain hemlock","Ulmus americana	American elm","Ulmus rubra	slippery elm","Umbellularia californica	California bay","Ungnadia speciosa	Mexican buckeye","Vaccinium arboreum	tree sparkleberry","Washingtonia filifera	California palm","Yucca brevifolia	Joshua tree","Yucca elata	soaptree yucca","Yucca schidigera	Mojave yucca"
            ];
 		$(document).ready(function(){
                $( "#species" ).autocomplete({
                    source: availabletags
                });
				var latitude;
				var longitude;
			    $("#treeForm :input").prop("disabled", true);
                
                var options = {
                  enableHighAccuracy: true,
                };

				function get_location(){
					navigator.geolocation.getCurrentPosition(show_map, locationFail, options);
				}
		
				function show_map(position){
					latitude = position.coords.latitude;
					longitude = position.coords.longitude;
                    if(latitude==""){
                        dispalyLatLongStr = "Please refresh and enable location services";
                    }
                    else{
                        $("#latitude").val(latitude);
                        $("#longitude").val(longitude);
                        displayLatLongStr = latitude+", "+longitude;
                        $("#latlong").html(displayLatLongStr);
                        initialize();
                    }
				}
                    
                function locationFail(e){
                    alert("Please enable your geolocation, you many need to delete your browser's local files");
                }
		
			get_location();
		
			function initialize() {
				var myLatLng = new google.maps.LatLng(latitude, longitude);
				
                var mapOptions = {
					zoom: 15,
					center: myLatLng
				};
                
                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                
                <?php
                
                	$con = new PDO('mysql:host=crtreesorg.fatcowmysql.com;dbname=crtrees',"crtreesadmin","G0whalephants1!");
                    $s = $con->prepare("SELECT * FROM `trees`");
                    $s->execute();
                    $results = $s->fetchAll();
                    foreach($results as $result){
                        echo "
                            var contentString$result[ID] = '$result[Species]<br><img width=\'150px\' src=\'$result[LeafIMG]\'>';
                            
                            var infowindow$result[ID] = new google.maps.InfoWindow({
                                content: contentString$result[ID]
                            });
                            var tree = 'http://www.emoji-quiz-answers.com/wp-content/uploads/2014/11/deciduous_tree-small.png';
                            var marker$result[ID] = new google.maps.Marker({
                                position: new google.maps.LatLng($result[Lat],$result[Long]),
                                map: map,
                                icon: tree,
                                title: '$result[Species]'
                            });
                            
                            var marker = new MarkerWithLabel({
                                position: myLatLng,
                                icon: {
                                path: google.maps.SymbolPath.CIRCLE,
                                scale: 0,
                                },
                                map: map,
                                labelAnchor: new google.maps.Point(10, 10),
                                labelClass: 'label',
                                title: 'Current Location'
                	        });
                            
                            google.maps.event.addListener(marker$result[ID], 'click', function() {
                                infowindow$result[ID].open(map,marker$result[ID]);
                            });
                        ";
                    }
                
                ?>
                $("#treeForm :input").prop("disabled", false);

			}
			
		});
		
	 </script>
	</head>
	
	<body>
        <div class='container'>
        <div class='row'>
		<div class='col-sm-12' style='text-align: center;' id="map-canvas"><em>...map loading...</em></div>
        </div>
            
        <div class='row'>
            <div class='col-sm-12'><p id='latlong'></p></div>
        </div>
        
        <form method='POST' action='http://crtrees.org/insertTree.php' enctype="multipart/form-data" id='treeForm'>
            
            <div class='form-group'>
                <label for='species'>Species<a target='_blank' href='https://www.arborday.org/trees/whattree/whatTree.cfm?ItemID=E6A'>[?]</a></label>
			    <input type='text' name='species' class='form-control' id='species' />
            </div>
            
            <div class='form-group'>
			     <label for='height'>Height (approx feet)</label>
			     <input type='number' name='height' class='form-control' id='height'/>
            </div>
            
            <div class='form-group'>
                <label for='health'>Health</label>
                <select id='health' class='form-control' name='health'>
                    <option value=''>...health...</option>
                    <option value='g'>Good</option>
                    <option value='f'>Fair</option>
                    <option value='p'>Poor</option>
                    <option value='d'>Dead</option>
                </select>
            </div>
            
            <div class='form-group'>
                <label for='leaf_image'>Image of Tree</label>
                <input type='file' class='form-control' name='leaf_image' id='leaf_image'>
            </div>
            <input type='hidden' name='latitude' id='latitude'>
            <input type='hidden' name='longitude' id='longitude'>
			<button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
	</body>
</html>
