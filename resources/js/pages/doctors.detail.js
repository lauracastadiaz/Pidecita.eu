/**
 *
 * DoctorsDetail
 *
 * DoctorsDetail page content scripts. Initialized from scripts.js file.
 *
 *  tiene el mismo contenido que doctors.js hay que modificarlo(? 
 */

class DoctorsDetail {
  constructor() {
    this._initRating();
  }

  // Doctor rating initialization (calificación para los doctores)
  _initRating() {
    jQuery('.rating').each(function () {
      const current = jQuery(this).data('initialRating');
      const readonly = jQuery(this).data('readonly');
      const showSelectedRating = jQuery(this).data('showSelectedRating');
      const showValues = jQuery(this).data('showValues');
      jQuery(this).barrating({
        initialRating: current,
        readonly: readonly,
        showValues: showValues,
        showSelectedRating: showSelectedRating,
        onSelect: function (value, text) {},
        onClear: function (value, text) {},
      });
    });
  }
}
