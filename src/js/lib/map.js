$(function () {
  var cityData = {
    city: [
      {
        name: "Київ",
        slag: "kiev",
        url: "/kiev.html",
        latCenter: 50.46767132969858,
        lngCenter: 30.50687719918059,
        list: [
          {
            lat: 50.46767132969858,
            lng: 30.50687719918059,
            title: "IONITY Charging station",
            address: "вул. Кирилівська, 69",
            description: "CCS2, CHAdeMO",
          },
          {
            lat: 50.48354833783605,
            lng: 30.59193605500514,
            title: "IONITY Charging station",
            address: "бульв. Перова, 19",
            description: "CCS2, CHAdeMO",
          },
        ],
      },
      {
        name: "Рівне",
        slag: "rovno",
        url: "/rovno.html",
        latCenter: 50.62187073112024,
        lngCenter: 26.228016283846596,
        list: [
          {
            lat: 50.62187073112024,
            lng: 26.228016283846596,
            title: "IONITY Charging station",
            address: "вул. Дубенська, 11б/1",
            description: "CCS2, CHAdeMO",
          },
        ],
      },
      {
        name: "Вінниця",
        slag: "vinnitsa",
        url: "/vinnitsa.html",
        latCenter: 49.224298623782175,
        lngCenter: 28.420795577533458,
        list: [
          {
            lat: 49.224298623782175,
            lng: 28.420795577533458,
            title: "IONITY Charging station",
            address: "просп. Космонавтів, 49",
            description: "CCS2, CHAdeMO",
          },
        ],
      },
      {
        name: "Одеса",
        slag: "odessa",
        url: "/odessa.html",
        latCenter: 46.522227061712925,
        lngCenter: 30.717566931956284,
        list: [
          {
            lat: 46.456490967847444,
            lng: 30.756727760367355,
            title: "IONITY Charging station",
            address: "вул. Довженка, 4",
            description: "CCS2, CHAdeMO",
          },
          {
            lat: 46.58999462206971,
            lng: 30.788519312503112,
            title: "IONITY Charging station",
            address: "вул. Генерала Бочарова, 13",
            description: "CCS2, CHAdeMO",
          },
        ],
      },
      {
        name: "Житомир",
        slag: "zhytomir",
        url: "/zhytomir.html",
        latCenter: 50.257547870351786,
        lngCenter: 28.70477353644497,
        list: [
          {
            lat: 50.257547870351786,
            lng: 28.70477353644497,
            title: "IONITY Charging station",
            address: "вул. Вітрука, 9",
            description: "CCS2, CHAdeMO",
          },
        ],
      },
      {
        name: "Тернопіль",
        slag: "ternopol",
        url: "/ternopol.html",
        latCenter: 49.55710957625602,
        lngCenter: 25.636513895445653,
        list: [
          {
            lat: 49.55710957625602,
            lng: 25.636513895445653,
            title: "IONITY Charging station",
            address: "вул. Вітрука, 9",
            description: "CCS2, CHAdeMO",
          },
        ],
      },
    ],
  };

  completeDropdown();
  if ($("#map").length) {
    mapFunction();
  }

  var map;
  var geocoder;
  var service;
  var distanse = 0;
  var lat;
  var lon;
  var cities = [];
  var places = [];
  var center;

  function initialize(latCenter, lngCenter, places) {
    var mapOptions = {
      zoom: 12,
      scrollwheel: false,
      gestureHandling: "cooperative",
      center: new google.maps.LatLng(latCenter, lngCenter),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
    };
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    var markerImage = new google.maps.MarkerImage("assets/img/geomark.png", new google.maps.Size(56, 56), new google.maps.Point(0, 0));
    var infos = [];
    var contentTxt;

    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    var markers = new Array();

    for (var i = 0; i < places.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(parseFloat(places[i].lat), parseFloat(places[i].lng)),
        map: map,
        icon: markerImage,
        title: places[i].title,
      });

      markers.push(marker);

      // infoBox
      google.maps.event.addListener(
        marker,
        "click",
        (function (marker, i) {
          return function () {
            setNewCenter(marker.getPosition().lat(), marker.getPosition().lng(), 13);
            if (infos.length > 0) {
              infos[0].set("marker", null);
              infos[0].setMap(null);
              infos.length = 0;
            }
            var infoBox = new InfoBox({
              latlng: marker.getPosition(),
              map: map,
              content: "<div class='title'>" + places[i].title + "</div><p>" + places[i].address + "</p><p><strong>" + places[i].description + "</strong></p>",
            });
            infos[0] = infoBox;
          };
        })(marker, i)
      );
    }
  }

  function setNewCenter(lat, lng, zoom) {
    var latlng = new google.maps.LatLng(lat, lng);
    map.setCenter(latlng);
    map.setZoom(zoom);
  }

  function completeDropdown() {
    // set autocomplete list
    for (var j = 0; j < cityData.city.length; j++) {
      $("#cityList").append('<li><a href="' + cityData.city[j].url + '">' + cityData.city[j].name + "</a></li>");
    }
  }

  function mapFunction() {
    // get url city
    var cityMain = $("#map").data("city");
    if (cityMain) {
      var selectedCity;
      for (var j = 0; j < cityData.city.length; j++) {
        if (cityData.city[j].slag === cityMain) {
          selectedCity = cityData.city[j];
        }
      }
      places = selectedCity.list;
    }

    // init google map
    initialize(selectedCity.latCenter, selectedCity.lngCenter, places);
  }

  /* An InfoBox is like an info window, but it displays
   * under the marker, opens quicker, and has flexible styling.
   * @param {GLatLng} latlng Point to place bar at
   * @param {Map} map The map on which to display this InfoBox.
   * @param {Object} opts Passes configuration options - content,
   *   offsetVertical, offsetHorizontal, className, height, width
   */
  function InfoBox(opts) {
    google.maps.OverlayView.call(this);
    this.latlng_ = opts.latlng;
    this.map_ = opts.map;
    this.content = opts.content;
    this.offsetVertical_ = -113;
    this.offsetHorizontal_ = -240;
    this.height_ = "auto";
    var me = this;
    this.boundsChangedListener_ = google.maps.event.addListener(this.map_, "bounds_changed", function () {
      return me.panMap.apply(me);
    });

    // Once the properties of this OverlayView are initialized, set its map so
    // that we can display it.  This will trigger calls to panes_changed and
    // draw.
    this.setMap(this.map_);
  }

  /* InfoBox extends GOverlay class from the Google Maps API
   */
  InfoBox.prototype = new google.maps.OverlayView();

  /* Creates the DIV representing this InfoBox
   */
  InfoBox.prototype.remove = function () {
    if (this.div_) {
      this.div_.parentNode.removeChild(this.div_);
      this.div_ = null;
    }
  };

  /* Redraw the Bar based on the current projection and zoom level
   */
  InfoBox.prototype.draw = function () {
    // Creates the element if it doesn't exist already.
    this.createElement(top);
    if (!this.div_) return;

    // Calculate the DIV coordinates of two opposite corners of our bounds to
    // get the size and position of our Bar
    var pixPosition = this.getProjection().fromLatLngToDivPixel(this.latlng_);
    if (!pixPosition) return;

    // Now position our DIV based on the DIV coordinates of our bounds
    //this.div_.style.width = this.width_ + "px";
    this.div_.style.left = pixPosition.x + this.offsetHorizontal_ + "px";
    this.div_.style.height = this.height_ + "px";
    this.div_.style.top = pixPosition.y + this.offsetVertical_ + "px";
    this.div_.style.display = "block";
  };

  /* Creates the DIV representing this InfoBox in the floatPane.  If the panes
   * object, retrieved by calling getPanes, is null, remove the element from the
   * DOM.  If the div exists, but its parent is not the floatPane, move the div
   * to the new pane.
   * Called from within draw.  Alternatively, this can be called specifically on
   * a panes_changed event.
   */
  InfoBox.prototype.createElement = function () {
    var panes = this.getPanes();
    var div = this.div_;
    if (!div) {
      // This does not handle changing panes.  You can set the map to be null and
      // then reset the map to move the div.
      div = this.div_ = document.createElement("div");
      div.className = "infobox";
      div.style.display = "none";
      div.style.position = "absolute";
      var contentDiv = document.createElement("div");
      div.contentDiv = "infobox-inner";
      contentDiv.innerHTML = this.content;
      var topDiv = document.createElement("div");
      topDiv.style.position = "absolute";
      topDiv.style.top = "0";
      topDiv.style.right = "0";
      topDiv.style.width = "20px";
      topDiv.style.height = "20px";
      topDiv.style.cursor = "pointer";

      google.maps.event.addDomListener(topDiv, "click", removeInfoBox(this));

      div.appendChild(topDiv);
      div.appendChild(contentDiv);
      div.style.display = "none";
      panes.floatPane.appendChild(div);
      this.panMap();
    } else if (div.parentNode != panes.floatPane) {
      // The panes have changed.  Move the div.
      div.parentNode.removeChild(div);
      panes.floatPane.appendChild(div);
    } else {
      // The panes have not changed, so no need to create or move the div.
    }
    //setTimeout(function(){$('.hideClass').hide();}, 50);
    //$('.close-image').click();
  };

  /* Pan the map to fit the InfoBox.
   */
  InfoBox.prototype.panMap = function () {
    // if we go beyond map, pan map
    var map = this.map_;
    var bounds = map.getBounds();
    if (!bounds) return;

    // The position of the infowindow
    var position = this.latlng_;

    // The dimension of the infowindow
    var iwWidth = this.width_;
    var iwHeight = this.height_;

    // The offset position of the infowindow
    var iwOffsetX = this.offsetHorizontal_;
    var iwOffsetY = this.offsetVertical_;

    // Padding on the infowindow
    var padX = 40;
    var padY = 40;

    // The degrees per pixel
    var mapDiv = map.getDiv();
    var mapWidth = mapDiv.offsetWidth;
    var mapHeight = mapDiv.offsetHeight;
    var boundsSpan = bounds.toSpan();
    var longSpan = boundsSpan.lng();
    var latSpan = boundsSpan.lat();
    var degPixelX = longSpan / mapWidth;
    var degPixelY = latSpan / mapHeight;

    // The bounds of the map
    var mapWestLng = bounds.getSouthWest().lng();
    var mapEastLng = bounds.getNorthEast().lng();
    var mapNorthLat = bounds.getNorthEast().lat();
    var mapSouthLat = bounds.getSouthWest().lat();

    // The bounds of the infowindow
    var iwWestLng = position.lng() + (iwOffsetX - padX) * degPixelX;
    var iwEastLng = position.lng() + (iwOffsetX + iwWidth + padX) * degPixelX;
    var iwNorthLat = position.lat() - (iwOffsetY - padY) * degPixelY;
    var iwSouthLat = position.lat() - (iwOffsetY + iwHeight + padY) * degPixelY;

    // calculate center shift
    var shiftLng = (iwWestLng < mapWestLng ? mapWestLng - iwWestLng : 0) + (iwEastLng > mapEastLng ? mapEastLng - iwEastLng : 0);
    var shiftLat = (iwNorthLat > mapNorthLat ? mapNorthLat - iwNorthLat : 0) + (iwSouthLat < mapSouthLat ? mapSouthLat - iwSouthLat : 0);

    // The center of the map
    var center = map.getCenter();

    // The new map center
    var centerX = center.lng() - shiftLng;
    var centerY = center.lat() - shiftLat;

    // center the map to the new shifted center
    map.setCenter(new google.maps.LatLng(centerY, centerX));

    // Remove the listener after panning is complete.
    google.maps.event.removeListener(this.boundsChangedListener_);
    this.boundsChangedListener_ = null;
  };

  function removeInfoBox(ib) {
    return function () {
      ib.setMap(null);
    };
  }
});
