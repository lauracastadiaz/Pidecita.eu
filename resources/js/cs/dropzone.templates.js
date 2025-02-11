/**
 *
 * DropzoneTemplates
 *
 * Dropzone Preview Templates
 *
 * Estas plantillas pueden ser utilizadas para personalizar la apariencia 
 * de la vista previa de archivos cargados en Dropzone según los requisitos específicos del proyecto.
 */

class DropzoneTemplates {
  // No icon for file types, only an image

  /* 
        Una plantilla de vista previa que muestra una imagen, el nombre del archivo, 
        su tamaño y una barra de progreso de carga. 
        También incluye iconos para indicar éxito o error en la carga del archivo, 
        así como un icono de eliminación para eliminar el archivo cargado.
  */
  static previewImageTemplate = `
      <div class="dz-preview dz-file-preview mb-3">
        <div class="d-flex flex-row">
            <div class="p-0 position-relative image-container">
                <div class="preview-container">
                    <img data-dz-thumbnail class="img-thumbnail border-0" />
                </div>
                <div class="dz-error-mark">
                    <i class="cs-close-circle"></i>
                </div>
                <div class="dz-success-mark">
                  <i class="cs-check"></i>
                </div>
            </div>
            <div class="ps-3 pt-2 pe-2 pb-1 dz-details position-relative">
                <div><span data-dz-name></span></div>
                <div class="text-primary text-extra-small" data-dz-size />
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
            </div>
            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
            <div class="dz-error-message"><span data-dz-errormessage></span></div>
        </div>
        <a href="#/" class="remove" data-dz-remove><i class="cs-bin"></i></a>
    </div>`;

  // Standard preview template

  /* 
    Una variante de la plantilla de vista previa que incluye un icono de archivo para 
    tipos de archivo que no son imágenes
  */

  static previewTemplate = `
      <div class="dz-preview dz-file-preview mb-3">
        <div class="d-flex flex-row">
            <div class="p-0 position-relative image-container">
                <div class="preview-container">
                    <img data-dz-thumbnail class="img-thumbnail border-0" />
                    <i class="cs-file-text preview-icon"></i>
                </div>
                <div class="dz-error-mark">
                    <i class="cs-close-circle"></i>
                </div>
                <div class="dz-success-mark">
                  <i class="cs-check"></i>
                </div>
            </div>
            <div class="ps-3 pt-2 pe-2 pb-1 dz-details position-relative">
                <div><span data-dz-name></span></div>
                <div class="text-primary text-extra-small" data-dz-size />
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
            </div>
            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
            <div class="dz-error-message"><span data-dz-errormessage></span></div>
        </div>
        <a href="#/" class="remove" data-dz-remove><i class="cs-bin"></i></a>
    </div>`;

  // Column template

  /* 
     Una plantilla de vista previa diseñada para ser utilizada en una disposición de columna, 
     que muestra una imagen en una columna más estrecha junto con el nombre del archivo, 
     su tamaño y una barra de progreso de carga.
  */

  static columnPreviewImageTemplate = `
        <div class="dz-preview dz-file-preview col border-0 h-auto me-0">
            <div class="d-flex flex-column border rounded-md">
                <div class="p-0 position-relative image-container w-100">
                    <div class="preview-container rounded-0 rounded-md-top">
                        <img data-dz-thumbnail class="img-thumbnail border-0 rounded-0 rounded-md-top sh-18" />
                    </div>
                    <div class="dz-error-mark">
                        <i class="cs-close-circle"></i>
                    </div>
                    <div class="dz-success-mark">
                        <i class="cs-check"></i>
                    </div>
                </div>
                <div class="ps-3 pt-3 pe-2 pb-1 dz-details position-relative w-100">
                    <div><span data-dz-name></span></div>
                    <div class="text-primary text-extra-small" data-dz-size />
                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                </div>
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
            </div>
            <a href="#/" class="remove" data-dz-remove><i class="cs-bin"></i></a>
        </div>`;
}
