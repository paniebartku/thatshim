/* eslint-disable */
import $ from "jquery";

import "popper.js";
import "bootstrap/js/dist/util";
import "bootstrap/js/dist/dropdown";
import "bootstrap/js/dist/collapse";
import "bootstrap/js/dist/modal";

import "ekko-lightbox/dist/ekko-lightbox.min.js";
import "ekko-lightbox/dist/ekko-lightbox.css";
import "./scss/style.scss";

//import polaroidGallery from "./js/polaroidGallery.js";

$(document).ready(function() {
  $(document).on("click", '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  });
});
("use strict");
(function($) {
  $(function() {
    console.log("So it begins");
  });
})(jQuery);
