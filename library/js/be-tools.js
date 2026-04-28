(function () {

  tinymce.PluginManager.add('be_mce_button', function (editor, url) {
    editor.addButton('be_mce_button', {
      icon: ' be-icon ',
      tooltip: 'BE Herramientas',
      type: 'menubutton',
      minWidth: 200,
      toolbar_location: 'bottom',
      menu: [
        {
          text: 'Encabezados',
          icon: ' be-ico_headings',
          menu: [
            {
              text: 'Encabezado h1',
              icon: ' be-ico_headings_h1',
              onclick: function () {
                editor.insertContent('<hr />\n' +
                  '<h1 style="text-align: center;">Title</h1>\n' +
                  '&nbsp;');
              }
            },
            {
              text: 'Encabezado h2',
              icon: ' be-ico_headings_h2',
              onclick: function () {
                editor.insertContent('<hr />\n' +
                  '<h2 style="text-align: center;">Title</h2>\n' +
                  '&nbsp;');
              }
            },
            {
              text: 'Encabezado h3',
              icon: ' be-ico_headings_h3',
              onclick: function () {
                editor.insertContent('<hr />\n' +
                  '<h3 style="text-align: center;">Title</h3>\n' +
                  '&nbsp;');
              }
            },
            {
              text: 'Encabezado h4',
              icon: ' be-ico_headings_h4',
              onclick: function () {
                editor.insertContent('<hr />\n' +
                  '<h4 style="text-align: center;">Title</h4>\n' +
                  '&nbsp;');
              }
            },
            {
              text: 'Encabezado h5',
              icon: ' be-ico_headings_h5',
              onclick: function () {
                editor.insertContent('<hr />\n' +
                  '<h5 style="text-align: center;">Title</h5>\n' +
                  '&nbsp;');
              }
            },
            {
              text: 'Encabezado h6',
              icon: ' be-ico_headings_h6',
              onclick: function () {
                editor.insertContent('<hr />\n' +
                  '<h6 style="text-align: center;">Title</h6>\n' +
                  '&nbsp;');
              }
            },
          ]
        },
        {
          text: 'Elementos',
          icon: ' be-ico_elements',
          menu: [
            {
              text: 'Línea',
              icon: ' be-ico_elements_line',
              onclick: function () {
                let changeSettings = false;
                let htmlCode = '';
                editor.windowManager.open({
                  title: 'Insertar línea',
                  minWidth: 200,
                  body: [
                    {
                      type: 'textbox',
                      name: 'widthLine',
                      id: 'widthLine',
                      label: 'Ancho (px)',
                      value: '1',
                      placeholder: 'Introduce un valor en pixeles',
                    },
                    {
                      type: 'label',
                      html: '<label for="fruits">Estilo:</label>' +
                        '<select id="styleLine" name="styleLine" ' +
                        'style="border: 1px solid #dcdcde;\n' +
                        'border-radius: 0;\n' +
                        'box-shadow: inset 0 1px 2px rgba(0, 0, 0, .07);\n' +
                        'padding: 0 28px 0 4px;\n' +
                        'margin-left: 60px;\n' +
                        'margin-bottom: 2px;\n' +
                        'width: 169px;\n' +
                        '-webkit-appearance: none;\n' +
                        'background: #fff url(data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2220%22%20height%3D%2220%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M5%206l5%205%205-5%202%201-7%207-7-7%202-1z%22%20fill%3D%22%23555%22%2F%3E%3C%2Fsvg%3E) no-repeat right 5px top 55%;\n' +
                        'background-size: 16px 16px;\n' +
                        'cursor: pointer;\n' +
                        'vertical-align: middle;">' +
                        '<option value="dotted">Dotted</option>' +
                        '<option value="dashed">Dashed</option>' +
                        '<option value="solid">Solid</option>' +
                        '<option value="double">Double</option>' +
                        '<option value="groove">Grove</option>' +
                        '<option value="inset">Inset</option>' +
                        '<option value="ridge">Ridge</option>' +
                        '</select>',
                    },
                    {
                      type: 'label',
                      minWidth: 300,
                      minHeight: 50,
                      html: '<label for="colorPickerLine">Color:</label>\n' +
                        '<input type="color" id="colorPickerLine" name="colorPickerLine" value="#2d2d2d" style="inline-size: 50px;\n' +
                        'block-size: 27px;\n' +
                        'box-sizing: border-box;\n' +
                        'background-color: buttonface;\n' +
                        'color: buttontext;\n' +
                        'border-width: 1px;\n' +
                        'border-color: #dcdcde;\n' +
                        'padding: 0px 2px;\n' +
                        'margin-left: 55px;\n' +
                        'margin-top: 1px;">' +
                        '<input id="colorCodeLine" hidefocus="1" ' +
                        'placeholder="Introduce un valor válido" ' +
                        'disabled="disabled" ' +
                        'value="#2d2d2d"' +
                        'class="mce-textbox mce-abs-layout-item mce-last mce-disabled" ' +
                        'aria-labelledby="colorCodeLine-l" ' +
                        'aria-disabled="true" ' +
                        'style="left: 152px; ' +
                        'top: 0px; ' +
                        'width: 138px; ' +
                        'height: 28px;">',
                    },
                    {
                      type: 'label',
                      name: 'demoLineElement',
                      id: 'demoLineElement',
                      text: 'Ejemplo',
                      minWidth: 300,
                      minHeight: 50,
                      html: '<p id="demoLineError" style="color: red; text-align: center; display: none">¡Valor no válido!</p>' +
                        '<hr id="demoLine" style="display: block;' +
                        'border-bottom-width: 3px !important;' +
                        'border-bottom-style: dotted !important;' +
                        'border-bottom-color: rgb(45, 45, 45) !important;' +
                        'overflow: hidden !important;' +
                        'clear: both !important;' +
                        'margin-bottom: 10px !important;' +
                        'margin-top: 10px !important;">',
                    },
                  ],
                  oninput: function (editor) {
                    changeSettings = true;

                    let widthLine = document.getElementById('widthLine');
                    let styleLine = document.getElementById('styleLine');
                    let colorPickerLine = document.getElementById('colorPickerLine');
                    let colorCodeLine = document.getElementById('colorCodeLine');
                    let demoLine = document.getElementById('demoLine');
                    let demoLineError = document.getElementById('demoLineError');

                    // If select color with color picker, assign value to color code line control
                    if (colorPickerLine.value) {
                      colorCodeLine.value = colorPickerLine.value;
                    }

                    // Replace anything that is not a number with an empty string
                    let widthLine_ = widthLine.value.replace(/[^0-9]/g, 'false');

                    // Change demo line
                    if (widthLine_.includes('false') || widthLine.value === '') {
                      demoLineError.style.display = 'block';
                      demoLine.style.display = 'none';
                      ;
                    } else {
                      changeSettings = true;
                      demoLineError.style.display = 'none';
                      htmlCode = demoLine.style.cssText = 'border-bottom-width: ' + widthLine.value + 'px;' +
                        'border-bottom-style: ' + styleLine.value + ' !important;' +
                        'border-bottom-color:' + colorPickerLine.value + ' !important;' +
                        'overflow: hidden !important;' +
                        'clear: both !important;' +
                        'margin-bottom: 10px !important;' +
                        'margin-top: 10px !important;';
                    }
                  },
                  onsubmit: function (e) {
                    if (!changeSettings) {
                      editor.insertContent('<hr>');
                    } else {
                      editor.insertContent('<hr style="' + htmlCode + '">');
                    }
                  },
                });
              }
            },
            {
              text: 'Alpha',
              icon: ' be-ico_elements_alpha',
              onclick: function () {
                editor.insertContent('Δ &nbsp;');
              }
            },
            {
              text: 'Phi',
              icon: ' be-ico_elements_phi',
              onclick: function () {
                editor.insertContent('Φ &nbsp;');
              }
            },
            {
              text: 'Mason',
              icon: ' be-ico_elements_mason',
              onclick: function () {
                editor.insertContent('∴ &nbsp;');
              }
            },
            {
              text: 'Tabla',
              icon: ' be-ico_elements_table',
              onclick: function () {

                var win = editor.windowManager.open({
                  title: 'Insertar tabla',
                  body: [
                    {
                      type: 'textbox',
                      name: 'titleTextTable',
                      id: 'titleTextTable',
                      label: 'Título',
                      value: 'Título',
                      placeholder: 'Título',
                      disabled: false,
                    },
                    {
                      type: 'checkbox',
                      name: 'titleStatusTable',
                      id: 'titleStatusTable',
                      label: 'Habilitar',
                      checked: true,
                    },
                    {
                      type: 'label',
                      name: 'separatorTable1',
                      id: 'separatorTable1',
                      text: '',
                      html: '<hr style="height: 1px;\n' +
                        '    background-color: #dcdcde;">',
                    },
                    {
                      type: 'checkbox',
                      name: 'topHeadingTable',
                      id: 'topHeadingTable',
                      label: 'Encabezados superiores',
                      checked: true,
                    },
                    {
                      type: 'checkbox',
                      name: 'rightHeadingTable',
                      id: 'rightHeadingTable',
                      label: 'Encabezados laterales',
                      checked: true,
                    },
                    {
                      type: 'label',
                      name: 'separatorTable2',
                      id: 'separatorTable2',
                      text: '',
                      html: '<hr style="height: 1px;\n' +
                        '    background-color: #dcdcde;">',
                    },
                    {
                      type: 'textbox',
                      name: 'columnsTable',
                      id: 'columnsTable',
                      label: 'Columnas',
                      value: '1',
                      placeholder: '1'
                    },
                    {
                      type: 'textbox',
                      name: 'rowsTable',
                      id: 'rowsTable',
                      label: 'Filas',
                      value: '1',
                      placeholder: '1',

                    },
                  ],
                  onchange: function (e) {
                    let titleStatusTable = document.getElementById('titleStatusTable');
                    let titleTextTable = document.getElementById('titleTextTable');
                    let isCheckedString = titleStatusTable.getAttribute("aria-checked");
                    titleTextTable.disabled = isCheckedString === 'true';
                  },
                  onsubmit: function (e) {
                    let htmlBody = '';
                    let htmlTitle = '';
                    let colSpan = 0;
                    let topHeadingTableBreak = false;

                    // Add 1 a columns table if right heading table is true
                    if (e.data.rightHeadingTable) {
                      colSpan = e.data.columnsTable + 1;
                    }

                    // Set title table
                    if (e.data.titleStatusTable) {
                      htmlTitle = '<tr><td style="' +
                        'background: #2d2d2d !important; ' +
                        'text-align: center; ' +
                        'font-weight: bold;' +
                        'text-transform: uppercase;' +
                        'color: #dddddd;' +
                        'text-shadow: 0 0 0 #000000;"' +
                        'colspan="' + colSpan + '">' + e.data.titleTextTable + '</td>\n' +
                        '</tr>';
                    } else {
                      htmlTitle = '';
                    }

                    // Set rows and columns table
                    if (e.data.rowsTable < '1' && e.data.columnsTable < '1') {
                      htmlBody = '<tr><td>Lorem</td></tr>';
                    } else {
                      for (let i = 0; i < e.data.columnsTable; i++) {
                        if (e.data.topHeadingTable && topHeadingTableBreak == false) {
                          htmlBody += '<tr>';
                          if (topHeadingTableBreak == false) {
                            htmlBody += '<td></td>';
                          }
                          for (let i = 0; i < e.data.rowsTable; i++) {
                            htmlBody += '<td style="background: #474747 !important; text-align: left; color: #dddddd;">T1</td>';
                          }
                          htmlBody += '</tr>';
                          topHeadingTableBreak = true;
                        }
                        htmlBody += '<tr>';
                        if (e.data.rightHeadingTable) {
                          htmlBody += '<td style="background: #474747 !important; text-align: left; color: #dddddd;">Lorem</td>';
                        }
                        for (let i = 0; i < e.data.rowsTable; i++) {
                          htmlBody += '<td>Lorem</td>';
                        }
                        htmlBody += '</tr>';
                      }
                      htmlRows = '';
                    }

                    editor.insertContent('<hr />' +
                      '<table style="font-size: 1.20em;">' +
                      '<tbody>' + htmlTitle + htmlBody + '</tbody>' +
                      '</table>');
                  },

                });
              }
            },
          ]
        },
        {
          text: 'Secciones',
          icon:
            ' be-ico_sections',
          menu:
            [
              {
                text: 'Sumario ∴ / Φ / Δ',
                icon: ' be-ico_sections_summary',
                onclick: function () {
                  editor.insertContent('<hr />\n' +
                    '<h1 style="text-align: center;">Sumario ∴ / Φ / Δ</h1>\n' +
                    '<ul>\n' +
                    ' \t<li>text</li>\n' +
                    ' \t<li>text</li>\n' +
                    ' \t<li>text</li>\n' +
                    ' \t<li>text</li>\n' +
                    ' \t<li>text</li>\n' +
                    '</ul>\n' +
                    '&nbsp;');
                }
              },
              {
                text: 'Referencias',
                icon: ' be-ico_sections_references',
                onclick: function () {
                  editor.insertContent('<hr />\n' +
                    '<h1 style="text-align: center;">Referencias</h1>\n' +
                    '<ul>\n' +
                    ' \t<li><strong>[WIKIPEDIA] = </strong>TÍTULO. En Wikipedia. Recuperado el DÍA de MES de AÑO de URL</li>\n' +
                    ' \t<li><strong>[LIBRO] = </strong>APELLIDO DEL AUTOR, NOMBRE DEL AUTOR, (AÑO), TÍTULO DEL LIBRO, <em>CAPÍTULO/TEMA</em>, PÁGS. (##-##), CIUDAD, PAÍS, EDITORIAL.</li>\n' +
                    ' \t<li><strong>[PODCAST] =</strong> APELLIDO DEL AUTOR, NOMBRE DEL AUTOR (AÑO, DÍA de MES), TÍTULO DEL PROGRAMA [Audio podcast]. Recuperado de URL</li>\n' +
                    ' \t<li><strong>[REVISTA DIGITAL] =</strong> APELLIDO AUTOR, NOMBRE DEL AUTOR (AÑO, DÍA de MES), TÍTULO DEL ARTÍCULO. <em>NOMBRE DE LA REVISTA, (VOLUMEN)</em>, p. #PÁGINA/S.</li>\n' +
                    ' \t<li><strong>[REVISTA] =</strong> NOMBRE DE LA REVISTA, (FECHA). TÍTULO DEL ARTÍCULO. <em>TÍTULO DE REVISTA</em>, (AÑO:NÚM.), p. #PÁGINA/S.</li>\n' +
                    '</ul>');
                }
              },
              {
                text: 'Digitalización',
                icon: ' be-ico_sections_digitalization',
                onclick: function () {
                  editor.insertContent('<p style="text-align: center;">Digitalización por <strong>Biblioteca Enigmas ∴</strong></p>');
                }
              },
              {
                text: 'Traducción',
                icon: ' be-ico_sections_translate',
                onclick: function () {
                  editor.insertContent('<p style="text-align: center;">Traducción por <strong>Biblioteca Enigmas ∴</strong></p>');
                }
              },
              {
                text: 'Actualización',
                icon: ' be-ico_sections_update',
                onclick: function () {
                  const today = new Date();
                  const date = String(today.getDate()).padStart(2, '0') + '-' +
                    String(today.getMonth() + 1).padStart(2, '0') + '-' +
                    today.getFullYear();
                  editor.insertContent('<p style="text-align: center;">Actualización: <strong>' + date + '</strong></p>');
                }
              },
              {
                text: 'G∴ C∴',
                icon: ' be-ico_sections_gcamarenaprog',
                onclick: function () {

                  editor.insertContent('<p style="text-align: center;"><strong>G∴ C∴</strong></p>');
                }
              },
              {
                text: 'Biblioteca Enigmas ∴',
                icon: ' be-ico_sections_library',
                onclick: function () {

                  editor.insertContent('<p style="text-align: center;"><strong>Biblioteca Enigmas ∴</strong></p>');
                }
              },
              {
                text: 'Cuento ∴',
                icon: ' be-ico_sections_stories',
                onclick: function () {
                  const today = new Date();
                  const date = String(today.getDate()).padStart(2, '0') + '-' +
                    String(today.getMonth() + 1).padStart(2, '0') + '-' +
                    today.getFullYear();
                  editor.insertContent('<p style="text-align: center;"><strong>Fecha: ' + date + ' / 03:33 </strong><br>' +
                    '<strong>Ilustración: Generada por Gemini AI </strong><br>' +
                    '<strong>Autor: G∴ C∴</strong></p>');
                }
              },
            ]
        }
        ,
        {
          text: 'Columnas',
          icon:
            ' be-ico_cols',
          menu:
            [
              {
                text: '1 Columna',
                icon: ' be-ico_cols_1',
                onclick: function () {
                  editor.insertContent('<div class="row_">\n' +
                    '<div class="col_-xxl-12 col_-xl-12 col_-md-12 col_-sm-12 col_xs-12 text-center">Content column 1 of 2</div>\n' +
                    '&nbsp;');
                }
              },
              {
                text: '2 Columnas',
                icon: ' be-ico_cols_2',
                onclick: function () {
                  editor.insertContent('<div class="row_">\n' +
                    '<div class="col_-xxl-6 col_-xl-6 col_-md-6 col_-sm-12 col_xs-12 text-center">Content column 1 of 2</div>\n' +
                    '<div class="col_-xxl-6 col_-xl-6 col_-md-6 col_-sm-12 col_xs-12 text-center">Content column 2 of 2</div>\n' +
                    '</div>\n' +
                    '&nbsp;');
                }
              },
              {
                text: '3 Columnas',
                icon: ' be-ico_cols_3',
                onclick: function () {
                  editor.insertContent('<div class="row_">' +
                    '<div class="col_-xxl-4 col_-xl-4 col_-md-4 col_-sm-12 col_xs-12 text-center">Content column 1 of 3</div>' +
                    '<div class="col_-xxl-4 col_-xl-4 col_-md-4 col_-sm-12 col_xs-12 text-center">Content column 2 of 3</div>' +
                    '<div class="col_-xxl-4 col_-xl-4 col_-md-4 col_-sm-12 col_xs-12 text-center">Content column 3 of 3</div>' +
                    '</div>' +
                    '&nbsp;');
                }
              },
              {
                text: '4 Columnas',
                icon: ' be-ico_cols_4',
                onclick: function () {
                  editor.insertContent('<div class="row_">\n' +
                    '<div class="col_-xxl-3 col_-xl-3 col_-md-3 col_-sm-12 col_xs-12 text-center">Content column 1 of 4</div>\n' +
                    '<div class="col_-xxl-3 col_-xl-3 col_-md-3 col_-sm-12 col_xs-12 text-center">Content column 2 of 4</div>\n' +
                    '<div class="col_-xxl-3 col_-xl-3 col_-md-3 col_-sm-12 col_xs-12 text-center">Content column 3 of 4</div>\n' +
                    '<div class="col_-xxl-3 col_-xl-3 col_-md-3 col_-sm-12 col_xs-12 text-center">Content column 4 of 4</div>\n' +
                    '</div>\n' +
                    '&nbsp;');
                }
              },
            ]
        }
        ,
        {
          text: 'Imágenes',
          icon:
            ' be-ico_imgs',
          menu:
            [
              {
                text: 'A la izquierda',
                icon: ' be-ico_imgs_left',
                onclick: function () {
                  editor.windowManager.open({
                    title: 'Una imágen a la izquierda',
                    body: [
                      {
                        type: 'textbox',
                        name: 'textBoxText',
                        id: 'textBoxText',
                        label: 'Texto',
                        value: 'Texto',
                        placeholder: 'Texto'
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxWidth',
                        id: 'textBoxWidth',
                        label: 'Ancho en px',
                        value: '300',
                        placeholder: '300'
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxURL',
                        id: 'textBoxURL',
                        label: 'URL de la imágen',
                        placeholder: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg',
                        minWidth: 300,
                        value: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg'
                      },
                      {
                        type: 'button',
                        name: 'button',
                        text: 'Seleccionar imágen',
                        id: 'myButton',
                        value: null,

                        onclick: function () {
                          let mediaUploader;
                          if (mediaUploader) {
                            mediaUploader.open();
                            return;
                          }
                          mediaUploader = wp.media.frames.fle_frame = wp.media({
                            title: 'Añadir imágen a la izquierda',
                            button: {
                              text: 'Añadir'
                            },
                            multiple: false
                          })
                          mediaUploader.on('select', function () {
                            attachment = mediaUploader.state().get('selection').first().toJSON();
                            let textBoxURL = document.querySelector('#textBoxURL');
                            textBoxURL.value = attachment['url'];
                          });
                          mediaUploader.open();
                        }
                      },
                    ],
                    onsubmit: function (e) {
                      editor.insertContent('<div class="row_ mt20 mb20">' +
                        '<div class="col_-xxl-12 col_-xl-12 col_-md-12 col_-sm-12 col_xs-12 text-center">' +
                        '<figure class="wp-caption aligncenter" style="transform: rotate(-5deg); width: ' + e.data.textBoxWidth + 'px;">' +
                        '<a href="' + e.data.textBoxURL + '">' +
                        '<img class="wp-image size-full" title="' + e.data.textBoxText + '" alt="' + e.data.textBoxText + '" src="' + e.data.textBoxURL + '" alt="' + e.data.textBoxText + '" />' +
                        '</a>' +
                        '<div class="wp-caption-text">' + e.data.textBoxText + '</div>' +
                        '</figure>' +
                        '</div>' +
                        '</div>');
                    },

                  });
                }
              },
              {
                text: 'A la derecha',
                icon: ' be-ico_imgs_right',
                onclick: function () {
                  editor.windowManager.open({
                    title: 'Una imágen a la derecha',
                    body: [

                      {
                        type: 'textbox',
                        name: 'textBoxText',
                        id: 'textBoxText',
                        label: 'Texto',
                        value: 'Texto',
                        placeholder: 'Texto'
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxWidth',
                        id: 'textBoxWidth',
                        label: 'Ancho en px',
                        value: '300',
                        placeholder: '300'
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxURL',
                        id: 'textBoxURL',
                        label: 'URL de la imágen',
                        placeholder: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg',
                        minWidth: 300,
                        value: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg'
                      },
                      {
                        type: 'button',
                        name: 'button',
                        text: 'Seleccionar imágen',
                        id: 'myButton',
                        value: null,

                        onclick: function () {
                          let mediaUploader;
                          if (mediaUploader) {
                            mediaUploader.open();
                            return;
                          }
                          mediaUploader = wp.media.frames.fle_frame = wp.media({
                            title: 'Añadir imágen a la derecha',
                            button: {
                              text: 'Añadir'
                            },
                            multiple: false
                          })
                          mediaUploader.on('select', function () {
                            attachment = mediaUploader.state().get('selection').first().toJSON();
                            let textBoxURL = document.querySelector('#textBoxURL');
                            textBoxURL.value = attachment['url'];
                          });
                          mediaUploader.open();
                        }
                      },
                    ],
                    onsubmit: function (e) {
                      editor.insertContent('<div class="row_ mt20 mb20">' +
                        '<div class="col_-xxl-12 col_-xl-12 col_-md-12 col_-sm-12 col_xs-12 text-center">' +
                        '<figure class="wp-caption aligncenter" style="transform: rotate(5deg); width: ' + e.data.textBoxWidth + 'px;">' +
                        '<a href="' + e.data.textBoxURL + '">' +
                        '<img class="wp-image size-full" title="' + e.data.textBoxText + '" alt="' + e.data.textBoxText + '" src="' + e.data.textBoxURL + '" alt="' + e.data.textBoxText + '" />' +
                        '</a>' +
                        '<div class="wp-caption-text">' + e.data.textBoxText + '</div>' +
                        '</figure>' +
                        '</div>' +
                        '</div>');
                    },
                  });
                }
              },
              {
                text: 'Añadir 2',
                icon: ' be-ico_imgs_2',
                onclick: function () {
                  editor.windowManager.open({
                    title: 'Añadir 2 imágenes',
                    body: [
                      {
                        type: 'textbox',
                        name: 'textBoxTextImg1',
                        id: 'textBoxTextImg1',
                        label: 'IMG1 Texto',
                        value: 'Texto',
                        placeholder: 'Texto'
                      },
                      {
                        type: 'label',
                        html: '<legend>Alineación:</legend>\n' +
                          '  <div style="margin-left: 1px; margin-bottom: 1px;">\n' +
                          '   <input type="radio" id="der-izq" name="align" value="der-izq" checked />\n' +
                          '   <label for="der-izq">' +
                          '     <i class="mce-ico mce-i- be-ico_imgs_left"  style="width: 20px;"></i>' +
                          '     <i class="mce-ico mce-i- be-ico_imgs_right" style="width: 20px;"></i>' +
                          '   </label>\n' +
                          '  </div>\n'+
                          '  <div style="margin-left: 1px; margin-bottom: 1px;">\n' +
                          '   <input type="radio" id="izq-der" name="align" value="izq-der" checked />\n' +
                          '   <label for="izq-der">' +
                          '     <i class="mce-ico mce-i- be-ico_imgs_right"  style="width: 20px;"></i>' +
                          '     <i class="mce-ico mce-i- be-ico_imgs_left" style="width: 20px;"></i>' +
                          '   </label>\n' +
                          '  </div>'
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxURLImg1',
                        id: 'textBoxURLImg1',
                        label: 'IMG1 URL',
                        placeholder: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg',
                        minWidth: 300,
                        value: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg'
                      },
                      {
                        type: 'button',
                        name: 'buttonImg1',
                        id: 'buttonImg1',
                        text: 'Seleccionar imágen',
                        value: null,

                        onclick: function () {
                          let mediaUploader;
                          if (mediaUploader) {
                            mediaUploader.open();
                            return;
                          }
                          mediaUploader = wp.media.frames.fle_frame = wp.media({
                            title: 'Añadir imágen a la derecha',
                            button: {
                              text: 'Añadir'
                            },
                            multiple: false
                          })
                          mediaUploader.on('select', function () {
                            attachment = mediaUploader.state().get('selection').first().toJSON();
                            let textBoxURLImg1 = document.querySelector('#textBoxURLImg1');
                            textBoxURLImg1.value = attachment['url'];
                          });
                          mediaUploader.open();
                        }
                      },

                      {
                        type: 'textbox',
                        name: 'textBoxTextImg2',
                        id: 'textBoxTextImg2',
                        label: 'IMG2 Texto',
                        value: 'Texto',
                        placeholder: 'Texto'
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxURLImg2',
                        id: 'textBoxURLImg2',
                        label: 'IMG2 URL',
                        placeholder: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg',
                        minWidth: 300,
                        value: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg'
                      },
                      {
                        type: 'button',
                        name: 'buttonImg2',
                        id: 'buttonImg2',
                        text: 'Seleccionar imágen',
                        value: null,

                        onclick: function () {
                          let mediaUploader;
                          if (mediaUploader) {
                            mediaUploader.open();
                            return;
                          }
                          mediaUploader = wp.media.frames.fle_frame = wp.media({
                            title: 'Añadir imágen a la derecha',
                            button: {
                              text: 'Añadir'
                            },
                            multiple: false
                          })
                          mediaUploader.on('select', function () {
                            attachment = mediaUploader.state().get('selection').first().toJSON();
                            let textBoxURLImg2 = document.querySelector('#textBoxURLImg2');
                            textBoxURLImg2.value = attachment['url'];
                          });
                          mediaUploader.open();
                        }
                      },
                    ],
                    onsubmit: function (e) {
                      editor.insertContent('<div class="row_ mt20 mb20">\n\n' +
                        '<div class="col_-xxl-6 col_-xl-6 col_-md-6 col_-sm-6 col_xs-12 text-center">\n' +
                        '<figure class="wp-caption aligncenter" style="transform: rotate(-5deg); width: 300px;">\n' +
                        '<a href="' + e.data.textBoxURLImg1 + '">\n' +
                        '<img class="wp-image size-full" title="' + e.data.textBoxTextImg1 + '" src="' + e.data.textBoxURLImg1 + '" alt="' + e.data.textBoxTextImg1 + '" />\n' +
                        '</a>\n' +
                        '<div class="wp-caption-text">' + e.data.textBoxTextImg1 + '</div>\n' +
                        '</figure>\n' +
                        '</div>\n' +
                        '<div class="col_-xxl-6 col_-xl-6 col_-md-6 col_-sm-6 col_xs-12 text-center">\n' +
                        '<figure class="wp-caption aligncenter" style="transform: rotate(5deg); width: 300px;">\n' +
                        '<a href="' + e.data.textBoxURLImg2 + '">\n' +
                        '<img class="wp-image size-full" title="' + e.data.textBoxTextImg2 + '" src="' + e.data.textBoxURLImg2 + '" alt="' + e.data.textBoxTextImg2 + '" />\n' +
                        '</a>\n' +
                        '<div class="wp-caption-text">' + e.data.textBoxTextImg2 + '</div>\n' +
                        '</figure>\n' +
                        '</div>\n' +
                        '</div>\n\n' +
                        '&nbsp;');
                    },
                  });
                }
              },
              {
                text: 'Añadir 3',
                icon: ' be-ico_imgs_3',
                onclick: function () {
                  editor.windowManager.open({
                    title: 'Añadir 3 imágenes',
                    body: [
                      {
                        type: 'textbox',
                        name: 'textBoxTextImg1',
                        id: 'textBoxTextImg1',
                        label: 'IMG1 Texto',
                        value: 'Texto',
                        placeholder: 'Texto'
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxURLImg1',
                        id: 'textBoxURLImg1',
                        label: 'IMG1 URL',
                        placeholder: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg',
                        minWidth: 300,
                        value: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg'
                      },
                      {
                        type: 'button',
                        name: 'buttonImg1',
                        id: 'buttonImg1',
                        text: 'Seleccionar imágen',
                        value: null,

                        onclick: function () {
                          let mediaUploader;
                          if (mediaUploader) {
                            mediaUploader.open();
                            return;
                          }
                          mediaUploader = wp.media.frames.fle_frame = wp.media({
                            title: 'Añadir imágen a la derecha',
                            button: {
                              text: 'Añadir'
                            },
                            multiple: false
                          })
                          mediaUploader.on('select', function () {
                            attachment = mediaUploader.state().get('selection').first().toJSON();
                            let textBoxURLImg1 = document.querySelector('#textBoxURLImg1');
                            textBoxURLImg1.value = attachment['url'];
                          });
                          mediaUploader.open();
                        }
                      },

                      {
                        type: 'textbox',
                        name: 'textBoxTextImg2',
                        id: 'textBoxTextImg2',
                        label: 'IMG2 Texto',
                        value: 'Texto',
                        placeholder: 'Texto'
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxURLImg2',
                        id: 'textBoxURLImg2',
                        label: 'IMG2 URL',
                        placeholder: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg',
                        minWidth: 300,
                        value: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg'
                      },
                      {
                        type: 'button',
                        name: 'buttonImg2',
                        id: 'buttonImg2',
                        text: 'Seleccionar imágen',
                        value: null,

                        onclick: function () {
                          let mediaUploader;
                          if (mediaUploader) {
                            mediaUploader.open();
                            return;
                          }
                          mediaUploader = wp.media.frames.fle_frame = wp.media({
                            title: 'Añadir imágen a la derecha',
                            button: {
                              text: 'Añadir'
                            },
                            multiple: false
                          })
                          mediaUploader.on('select', function () {
                            attachment = mediaUploader.state().get('selection').first().toJSON();
                            let textBoxURLImg2 = document.querySelector('#textBoxURLImg2');
                            textBoxURLImg2.value = attachment['url'];
                          });
                          mediaUploader.open();
                        }
                      },

                      {
                        type: 'textbox',
                        name: 'textBoxTextImg3',
                        id: 'textBoxTextImg3',
                        label: 'IMG3 Texto',
                        value: 'Texto',
                        placeholder: 'Texto'
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxURLImg3',
                        id: 'textBoxURLImg3',
                        label: 'IMG3 URL',
                        placeholder: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg',
                        minWidth: 300,
                        value: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg'
                      },
                      {
                        type: 'button',
                        name: 'buttonImg3',
                        id: 'buttonImg3',
                        text: 'Seleccionar imágen',
                        value: null,

                        onclick: function () {
                          let mediaUploader;
                          if (mediaUploader) {
                            mediaUploader.open();
                            return;
                          }
                          mediaUploader = wp.media.frames.fle_frame = wp.media({
                            title: 'Añadir imágen a la derecha',
                            button: {
                              text: 'Añadir'
                            },
                            multiple: false
                          })
                          mediaUploader.on('select', function () {
                            attachment = mediaUploader.state().get('selection').first().toJSON();
                            let textBoxURLImg3 = document.querySelector('#textBoxURLImg3');
                            textBoxURLImg3.value = attachment['url'];
                          });
                          mediaUploader.open();
                        }
                      },
                    ],
                    onsubmit: function (e) {
                      editor.insertContent('<div class="row_ mt20 mb20">\n\n' +
                        '<div class="col_-xxl-4 col_-xl-4 col_-md-4 col_-sm-6 col_xs-12 text-center">\n' +
                        '<figure class="wp-caption aligncenter" style="transform: rotate(5deg); ">\n' +
                        '<a href="' + e.data.textBoxURLImg1 + '">\n' +
                        '<img class="wp-image size-full" title="' + e.data.textBoxTextImg1 + '" src="' + e.data.textBoxURLImg1 + '" alt="' + e.data.textBoxTextImg1 + '" />\n' +
                        '</a>\n' +
                        '<div class="wp-caption-text">' + e.data.textBoxTextImg1 + '</div></figure>\n' +
                        '</div>\n' +
                        '<div class="col_-xxl-4 col_-xl-4 col_-md-4 col_-sm-6 col_xs-12 text-center">\n' +
                        '<figure class="wp-caption aligncenter" style="transform: rotate(-5deg); ">\n' +
                        '<a href="' + e.data.textBoxURLImg2 + '">\n' +
                        '<img class="wp-image size-full" title="' + e.data.textBoxTextImg2 + '" src="' + e.data.textBoxURLImg2 + '" alt="' + e.data.textBoxTextImg2 + '" />\n' +
                        '</a>\n' +
                        '<div class="wp-caption-text">' + e.data.textBoxTextImg2 + '</div></figure>\n' +
                        '</div>\n' +
                        '<div class="col_-xxl-4 col_-xl-4 col_-md-4 col_-sm-12 col_xs-12 text-center">\n' +
                        '<figure class="wp-caption aligncenter" style="transform: rotate(5deg); ">\n' +
                        '<a href="' + e.data.textBoxURLImg3 + '">\n' +
                        '<img class="wp-image size-full" title="' + e.data.textBoxTextImg3 + '" src="' + e.data.textBoxURLImg3 + '" alt="' + e.data.textBoxTextImg3 + '" />\n' +
                        '</a>\n' +
                        '<div class="wp-caption-text">' + e.data.textBoxTextImg3 + '</div></figure>\n' +
                        '</div>\n' +
                        '</div>\n\n' +
                        '&nbsp;');
                    },
                  });
                }
              },
              {
                text: 'Añadir 4',
                icon: ' be-ico_imgs_4',
                onclick: function () {
                  editor.windowManager.open({
                    title: 'Añadir 4 imágenes',
                    body: [
                      {
                        type: 'textbox',
                        name: 'textBoxTextImg1',
                        id: 'textBoxTextImg1',
                        label: 'IMG1 Texto',
                        value: 'Texto',
                        placeholder: 'Texto'
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxURLImg1',
                        id: 'textBoxURLImg1',
                        label: 'IMG1 URL',
                        placeholder: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg',
                        minWidth: 300,
                        value: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg'
                      },
                      {
                        type: 'button',
                        name: 'buttonImg1',
                        id: 'buttonImg1',
                        text: 'Seleccionar imágen',
                        value: null,

                        onclick: function () {
                          let mediaUploader;
                          if (mediaUploader) {
                            mediaUploader.open();
                            return;
                          }
                          mediaUploader = wp.media.frames.fle_frame = wp.media({
                            title: 'Añadir imágen a la derecha',
                            button: {
                              text: 'Añadir'
                            },
                            multiple: false
                          })
                          mediaUploader.on('select', function () {
                            attachment = mediaUploader.state().get('selection').first().toJSON();
                            let textBoxURLImg1 = document.querySelector('#textBoxURLImg1');
                            textBoxURLImg1.value = attachment['url'];
                          });
                          mediaUploader.open();
                        }
                      },

                      {
                        type: 'textbox',
                        name: 'textBoxTextImg2',
                        id: 'textBoxTextImg2',
                        label: 'IMG2 Texto',
                        value: 'Texto',
                        placeholder: 'Texto'
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxURLImg2',
                        id: 'textBoxURLImg2',
                        label: 'IMG2 URL',
                        placeholder: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg',
                        minWidth: 300,
                        value: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg'
                      },
                      {
                        type: 'button',
                        name: 'buttonImg2',
                        id: 'buttonImg2',
                        text: 'Seleccionar imágen',
                        value: null,

                        onclick: function () {
                          let mediaUploader;
                          if (mediaUploader) {
                            mediaUploader.open();
                            return;
                          }
                          mediaUploader = wp.media.frames.fle_frame = wp.media({
                            title: 'Añadir imágen a la derecha',
                            button: {
                              text: 'Añadir'
                            },
                            multiple: false
                          })
                          mediaUploader.on('select', function () {
                            attachment = mediaUploader.state().get('selection').first().toJSON();
                            let textBoxURLImg2 = document.querySelector('#textBoxURLImg2');
                            textBoxURLImg2.value = attachment['url'];
                          });
                          mediaUploader.open();
                        }
                      },

                      {
                        type: 'textbox',
                        name: 'textBoxTextImg3',
                        id: 'textBoxTextImg3',
                        label: 'IMG3 Texto',
                        value: 'Texto',
                        placeholder: 'Texto'
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxURLImg3',
                        id: 'textBoxURLImg3',
                        label: 'IMG3 URL',
                        placeholder: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg',
                        minWidth: 300,
                        value: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg'
                      },
                      {
                        type: 'button',
                        name: 'buttonImg3',
                        id: 'buttonImg3',
                        text: 'Seleccionar imágen',
                        value: null,

                        onclick: function () {
                          let mediaUploader;
                          if (mediaUploader) {
                            mediaUploader.open();
                            return;
                          }
                          mediaUploader = wp.media.frames.fle_frame = wp.media({
                            title: 'Añadir imágen a la derecha',
                            button: {
                              text: 'Añadir'
                            },
                            multiple: false
                          })
                          mediaUploader.on('select', function () {
                            attachment = mediaUploader.state().get('selection').first().toJSON();
                            let textBoxURLImg3 = document.querySelector('#textBoxURLImg3');
                            textBoxURLImg3.value = attachment['url'];
                          });
                          mediaUploader.open();
                        }
                      },

                      {
                        type: 'textbox',
                        name: 'textBoxTextImg4',
                        id: 'textBoxTextImg4',
                        label: 'IMG4 Texto',
                        value: 'Texto',
                        placeholder: 'Texto'
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxURLImg4',
                        id: 'textBoxURLImg4',
                        label: 'IMG4 URL',
                        placeholder: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg',
                        minWidth: 300,
                        value: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-image.jpg'
                      },
                      {
                        type: 'button',
                        name: 'buttonImg4',
                        id: 'buttonImg4',
                        text: 'Seleccionar imágen',
                        value: null,

                        onclick: function () {
                          let mediaUploader;
                          if (mediaUploader) {
                            mediaUploader.open();
                            return;
                          }
                          mediaUploader = wp.media.frames.fle_frame = wp.media({
                            title: 'Añadir imágen a la derecha',
                            button: {
                              text: 'Añadir'
                            },
                            multiple: false
                          })
                          mediaUploader.on('select', function () {
                            attachment = mediaUploader.state().get('selection').first().toJSON();
                            let textBoxURLImg4 = document.querySelector('#textBoxURLImg4');
                            textBoxURLImg4.value = attachment['url'];
                          });
                          mediaUploader.open();
                        }
                      },
                    ],
                    onsubmit: function (e) {
                      editor.insertContent('<div class="row_ mt20 mb20">\n\n' +
                        '<div class="col_-xxl-3 col_-xl-3 col_-md-3 col_-sm-6 col_xs-12 text-center">\n' +
                        '<figure class="wp-caption aligncenter" style="transform: rotate(-5deg); ">\n' +
                        '<a href="' + e.data.textBoxURLImg1 + '">\n' +
                        '<img class="wp-image size-full" title="' + e.data.textBoxTextImg1 + '" src="' + e.data.textBoxURLImg1 + '" alt="' + e.data.textBoxTextImg1 + '" />\n' +
                        '</a>\n' +
                        '<div class="wp-caption-text">' + e.data.textBoxTextImg1 + '</div></figure>\n' +
                        '</div>\n' +
                        '<div class="col_-xxl-3 col_-xl-3 col_-md-3 col_-sm-6 col_xs-12 text-center">\n' +
                        '<figure class="wp-caption aligncenter" style="transform: rotate(5deg); ">\n' +
                        '<a href="' + e.data.textBoxURLImg2 + '">\n' +
                        '<img class="wp-image size-full" title="' + e.data.textBoxTextImg2 + '" src="' + e.data.textBoxURLImg2 + '" alt="' + e.data.textBoxTextImg2 + '" />\n' +
                        '</a>\n' +
                        '<div class="wp-caption-text">' + e.data.textBoxTextImg2 + '</div></figure>\n' +
                        '</div>\n' +
                        '<div class="col_-xxl-3 col_-xl-3 col_-md-3 col_-sm-6 col_xs-12 text-center">\n' +
                        '<figure class="wp-caption aligncenter" style="transform: rotate(-5deg); ">\n' +
                        '<a href="' + e.data.textBoxURLImg3 + '">\n' +
                        '<img class="wp-image size-full" title="' + e.data.textBoxTextImg3 + '" src="' + e.data.textBoxURLImg3 + '" alt="' + e.data.textBoxTextImg3 + '" />\n' +
                        '</a>\n' +
                        '<div class="wp-caption-text">' + e.data.textBoxTextImg3 + '</div></figure>\n' +
                        '</div>\n' +
                        '<div class="col_-xxl-3 col_-xl-3 col_-md-3 col_-sm-6 col_xs-12 text-center">\n' +
                        '<figure class="wp-caption aligncenter" style="transform: rotate(5deg); ">\n' +
                        '<a href="' + e.data.textBoxURLImg4 + '">\n' +
                        '<img class="wp-image size-full" title="' + e.data.textBoxTextImg4 + '" src="' + e.data.textBoxURLImg4 + '" alt="' + e.data.textBoxTextImg4 + '" />\n' +
                        '</a>\n' +
                        '<div class="wp-caption-text">' + e.data.textBoxTextImg4 + '</div></figure>\n' +
                        '</div>\n' +
                        '</div>\n\n' +
                        '&nbsp;');
                    },
                  });
                }
              },
            ]
        }
        ,
        {
          text: 'YouTube',
          icon:
            ' be-ico_youtube',
          menu:
            [
              {
                text: 'Banner',
                icon: ' be-ico_youtube_banner',
                onclick: function () {
                  editor.windowManager.open({
                    title: 'Seleccionar una imágen',
                    body: [
                      {
                        type: 'textbox',
                        name: 'textChannelName',
                        id: 'textChannelName',
                        label: 'Nombre del canal:',
                        placeholder: 'Nombre del canal',
                        minWidth: 300,
                        value: 'Nombre del canal',
                      },
                      {
                        type: 'textbox',
                        name: 'textBoxURL',
                        id: 'textBoxURL',
                        label: 'URL de la imágen',
                        placeholder: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-banner.jpg',
                        minWidth: 300,
                        value: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-banner.jpg',
                      },
                      {
                        type: 'button',
                        name: 'button',
                        text: 'Seleccionar imágen',
                        id: 'myButton',
                        value: null,

                        onclick: function () {
                          let mediaUploader;
                          if (mediaUploader) {
                            mediaUploader.open();
                            return;
                          }
                          mediaUploader = wp.media.frames.fle_frame = wp.media({
                            title: 'Añadir banner',
                            button: {
                              text: 'Añadir'
                            },
                            multiple: false
                          })
                          mediaUploader.on('select', function () {
                            attachment = mediaUploader.state().get('selection').first().toJSON();
                            let textBoxURL = document.querySelector('#textBoxURL');
                            textBoxURL.value = attachment['url'];
                          });
                          mediaUploader.open();
                        }
                      },
                    ],
                    onsubmit: function (e) {
                      editor.insertContent('<a href="' + textBoxURL.value + '">' +
                        '<img class="aligncenter wp-image-25929 size-full" ' +
                        'src="' + textBoxURL.value + '" ' +
                        'alt="" /></a>' +
                        '<strong>' + e.data.textChannelName + '</strong> text of the printing ndomised words<strong> ' +
                        'which dont look</strong> even slightly believable. If you are going to use a passage of ' +
                        'Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of ' +
                        'text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as ' +
                        'necessary, making this the first true generator on the Internet. It uses lectronic typesetting, ' +
                        'remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset ' +
                        'sheets containing Lorem Ipsum passages, and more recently with desktop publishing software ' +
                        'like Aldus PageMaker including versions of Lorem Ipsum.' +
                        '<hr>' +
                        '&nbsp;');
                    },

                  });
                }
              },
              {
                text: 'Autores',
                icon: ' be-ico_youtube_author',
                onclick: function () {
                  editor.windowManager.open({
                    title: 'Nombre del autor',
                    body: [
                      {
                        type: 'textbox',
                        name: 'authorName',
                        id: 'authorName',
                        label: 'Nombre del autor:',
                        placeholder: 'Autor',
                        minWidth: 300,
                        value: 'Autor',
                      },
                      {
                        type: 'textbox',
                        name: 'imageURL',
                        id: 'imageURL',
                        label: 'URL de la imágen',
                        placeholder: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-writer.jpg',
                        minWidth: 300,
                        value: 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-writer.jpg',
                      },
                      {
                        type: 'checkbox',
                        name: 'noTitle',
                        id: 'noTitle',
                        label: 'Habilitar título',
                        checked: true,
                      },
                      {
                        type: 'button',
                        name: 'button',
                        text: 'Seleccionar imágen',
                        id: 'myButton',
                        value: null,

                        onclick: function () {
                          let mediaUploader;
                          if (mediaUploader) {
                            mediaUploader.open();
                            return;
                          }
                          mediaUploader = wp.media.frames.fle_frame = wp.media({
                            title: 'Añadir imágen del autor',
                            button: {
                              text: 'Añadir'
                            },
                            multiple: false
                          })
                          mediaUploader.on('select', function () {
                            attachment = mediaUploader.state().get('selection').first().toJSON();
                            let imageURL = document.querySelector('#imageURL');
                            imageURL.value = attachment['url'];
                          });
                          mediaUploader.open();
                        }
                      },
                    ],
                    onsubmit: function (e) {
                      let title = '';
                      if (e.data.noTitle) {
                        title = '<h1 style="text-align: center;">Acerca del autor</h1>\n'
                      }
                      editor.insertContent('' + title +
                        '<div class="tb-taxonomy-writer-img"' +
                        'style="text-align: center; padding: 0;">' +
                        '<img class="aligncenter wp-image-25931"' +
                        'src="' + e.data.imageURL + '" width="200" height="200" />' +
                        '<strong>' + e.data.authorName + '</strong></div>\n' +
                        '<strong>' + e.data.authorName + '</strong> simply dummy text of the printing and typesetting ' +
                        'industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when ' +
                        'an unknown printer took a galley of type and scrambled it to make a type specimen book. It has ' +
                        'survived not only five centuries, but also the leap into electronic typesetting, remaining ' +
                        'essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ' +
                        'containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus ' +
                        'PageMaker including versions of Lorem Ipsum.\n' +
                        '\n' +
                        'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been' +
                        ' the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a ' +
                        'galley of type and scrambled it to make a type specimen book. It has survived not only five ' +
                        'centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ' +
                        'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum ' +
                        'passages, and more recently with desktop publishing software like Aldus PageMaker including ' +
                        'versions of Lorem Ipsum.' +
                        '<hr>' +
                        '&nbsp;');
                    },

                  });
                }
              },
              {
                text: 'Libros publicados',
                icon: ' be-ico_youtube_books',
                onclick: function () {
                  editor.insertContent('<h1 style="text-align: center;">Libros publicados</h1>\n' +
                    'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \n' +
                    'Lorem Ipsum has been the industrys standard dummy text ever since the: \n' +
                    '<ul>\n' +
                    '<li>Ipsum is simply dummy text</li>\n' +
                    '<li>Ipsum is simply dummy text</li>\n' +
                    '<li>Ipsum is simply dummy text</li>\n' +
                    '<li>Ipsum is simply dummy text</li>\n' +
                    '<li>Ipsum is simply dummy text</li>\n' +
                    '</ul>\n' +
                    '<hr/>\n' +
                    '&nbsp;');
                }
              },
              {
                text: 'Contacto y redes sociales',
                icon: ' be-ico_youtube_social',
                onclick: function () {
                  editor.windowManager.open({
                    title: 'Nombre del autor',
                    body: [
                      {
                        type: 'label',
                        name: 'youtubeName1_',
                        id: 'youtubeName1_',
                        html: '<div id="mceu_232-body" class="mce-container-body mce-abs-layout" style="width: 444px; height: 32px;">' +
                          '<label id="youtubeName1-l" class="mce-widget mce-label mce-abs-layout-item mce-first" ' +
                          'for="youtubeName1" style="line-height: 19px;left: 0px;top: 6px;width: 100px;height: 19px;">YouTube</label>' +
                          '<input id="youtubeName1" placeholder="@nombreDelCanal" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 100px;top: 2px;width: 125px;height: 24px;">\n' +
                          '<input id="youtubeURL1" placeholder="https://youtube.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 240px;top: 2px;width: 194px;height: 24px;" ></div>'
                      },
                      {
                        type: 'label',
                        name: 'youtubeName2_',
                        id: 'youtubeName2_',
                        html: '<div id="mceu_232-body" class="mce-container-body mce-abs-layout" style="width: 444px; height: 32px;">' +
                          '<label id="youtubeName2-l" class="mce-widget mce-label mce-abs-layout-item mce-first" ' +
                          'for="youtubeName2" style="line-height: 19px;left: 0px;top: 6px;width: 100px;height: 19px;">YouTube</label>' +
                          '<input id="youtubeName2" placeholder="@nombreDelCanal" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 100px;top: 2px;width: 125px;height: 24px;">\n' +
                          '<input id="youtubeURL2" placeholder="https://youtube.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 240px;top: 2px;width: 194px;height: 24px;" ></div>'
                      },

                      {
                        type: 'label',
                        name: 'spotify_',
                        id: 'spotify_',
                        html: '<div id="mceu_232-body" class="mce-container-body mce-abs-layout" style="width: 444px; height: 32px;">' +
                          '<label id="spotifyName-l" class="mce-widget mce-label mce-abs-layout-item mce-first" ' +
                          'for="spotifyName" style="line-height: 19px;left: 0px;top: 6px;width: 100px;height: 19px;">Spotify</label>' +
                          '<input id="spotifyName" placeholder="@Spotify" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 100px;top: 2px;width: 125px;height: 24px;">\n' +
                          '<input id="spotifyURL" placeholder="https://spotify.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 240px;top: 2px;width: 194px;height: 24px;" ></div>'
                      },
                      {
                        type: 'label',
                        name: 'apple_',
                        id: 'apple_',
                        html: '<div id="mceu_232-body" class="mce-container-body mce-abs-layout" style="width: 444px; height: 32px;">' +
                          '<label id="appleName-l" class="mce-widget mce-label mce-abs-layout-item mce-first" ' +
                          'for="appleName" style="line-height: 19px;left: 0px;top: 6px;width: 100px;height: 19px;">Apple</label>' +
                          '<input id="appleName" placeholder="@apple" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 100px;top: 2px;width: 125px;height: 24px;">\n' +
                          '<input id="appleURL" placeholder="https://apple.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 240px;top: 2px;width: 194px;height: 24px;" ></div>'
                      },
                      {
                        type: 'label',
                        name: 'facebook_',
                        id: 'facebook_',
                        html: '<div id="mceu_232-body" class="mce-container-body mce-abs-layout" style="width: 444px; height: 32px;">' +
                          '<label id="facebookName-l" class="mce-widget mce-label mce-abs-layout-item mce-first" ' +
                          'for="facebookName" style="line-height: 19px;left: 0px;top: 6px;width: 100px;height: 19px;">Facebook</label>' +
                          '<input id="facebookName" placeholder="@facebook" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 100px;top: 2px;width: 125px;height: 24px;">\n' +
                          '<input id="facebookURL" placeholder="https://facebook.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 240px;top: 2px;width: 194px;height: 24px;" ></div>'
                      },

                      {
                        type: 'label',
                        name: 'x_',
                        id: 'x_',
                        html: '<div id="mceu_232-body" class="mce-container-body mce-abs-layout" style="width: 444px; height: 32px;">' +
                          '<label id="xName-l" class="mce-widget mce-label mce-abs-layout-item mce-first" ' +
                          'for="xName" style="line-height: 19px;left: 0px;top: 6px;width: 100px;height: 19px;">X</label>' +
                          '<input id="xName" placeholder="@x" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 100px;top: 2px;width: 125px;height: 24px;">\n' +
                          '<input id="xURL" placeholder="https://x.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 240px;top: 2px;width: 194px;height: 24px;" ></div>'
                      },
                      {
                        type: 'label',
                        name: 'instagram_',
                        id: 'instagram_',
                        html: '<div id="mceu_232-body" class="mce-container-body mce-abs-layout" style="width: 444px; height: 32px;">' +
                          '<label id="instagramName-l" class="mce-widget mce-label mce-abs-layout-item mce-first" ' +
                          'for="instagramName" style="line-height: 19px;left: 0px;top: 6px;width: 100px;height: 19px;">Instagram</label>' +
                          '<input id="instagramName" placeholder="@instagram" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 100px;top: 2px;width: 125px;height: 24px;">\n' +
                          '<input id="instagramURL" placeholder="https://instagram.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 240px;top: 2px;width: 194px;height: 24px;" ></div>'
                      },

                      {
                        type: 'label',
                        name: 'tiktok_',
                        id: 'tiktok_',
                        html: '<div id="mceu_232-body" class="mce-container-body mce-abs-layout" style="width: 444px; height: 32px;">' +
                          '<label id="tiktokName-l" class="mce-widget mce-label mce-abs-layout-item mce-first" ' +
                          'for="tiktokName" style="line-height: 19px;left: 0px;top: 6px;width: 100px;height: 19px;">TikTok</label>' +
                          '<input id="tiktokName" placeholder="@tiktok" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 100px;top: 2px;width: 125px;height: 24px;">\n' +
                          '<input id="tiktokURL" placeholder="https://tiktok.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 240px;top: 2px;width: 194px;height: 24px;" ></div>'
                      },
                      {
                        type: 'label',
                        name: 'threads_',
                        id: 'threads_',
                        html: '<div id="mceu_232-body" class="mce-container-body mce-abs-layout" style="width: 444px; height: 32px;">' +
                          '<label id="threadsName-l" class="mce-widget mce-label mce-abs-layout-item mce-first" ' +
                          'for="threadsName" style="line-height: 19px;left: 0px;top: 6px;width: 100px;height: 19px;">Threads</label>' +
                          '<input id="threadsName" placeholder="@threads" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 100px;top: 2px;width: 125px;height: 24px;">\n' +
                          '<input id="threadsURL" placeholder="https://threads.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 240px;top: 2px;width: 194px;height: 24px;" ></div>'
                      },
                      {
                        type: 'label',
                        name: 'patreon_',
                        id: 'patreon_',
                        html: '<div id="mceu_232-body" class="mce-container-body mce-abs-layout" style="width: 444px; height: 32px;">' +
                          '<label id="patreonName-l" class="mce-widget mce-label mce-abs-layout-item mce-first" ' +
                          'for="patreonName" style="line-height: 19px;left: 0px;top: 6px;width: 100px;height: 19px;">Patreon</label>' +
                          '<input id="patreonName" placeholder="@patreon" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 100px;top: 2px;width: 125px;height: 24px;">\n' +
                          '<input id="patreonURL" placeholder="https://patreon.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 240px;top: 2px;width: 194px;height: 24px;" ></div>'
                      },
                      {
                        type: 'label',
                        name: 'web_',
                        id: 'web_',
                        html: '<div id="mceu_232-body" class="mce-container-body mce-abs-layout" style="width: 444px; height: 32px;">' +
                          '<label id="webName-l" class="mce-widget mce-label mce-abs-layout-item mce-first" ' +
                          'for="webName" style="line-height: 19px;left: 0px;top: 6px;width: 100px;height: 19px;">Web</label>' +
                          '<input id="webName" placeholder="web.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 100px;top: 2px;width: 125px;height: 24px;">\n' +
                          '<input id="webURL" placeholder="https://web.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 240px;top: 2px;width: 194px;height: 24px;" ></div>'
                      },
                      {
                        type: 'label',
                        name: 'mail_',
                        id: 'mail_',
                        html: '<div id="mceu_232-body" class="mce-container-body mce-abs-layout" style="width: 444px; height: 32px;">' +
                          '<label id="mailName-l" class="mce-widget mce-label mce-abs-layout-item mce-first" ' +
                          'for="mailName" style="line-height: 19px;left: 0px;top: 6px;width: 100px;height: 19px;">Correo</label>' +
                          '<input id="mailName" placeholder="correo@mail.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 100px;top: 2px;width: 125px;height: 24px;">\n' +
                          '<input id="mailURL" placeholder="correo@mail.com" class="mce-textbox mce-abs-layout-item mce-last" ' +
                          'style="left: 240px;top: 2px;width: 194px;height: 24px;" ></div>'
                      },
                    ],
                    onsubmit: function (e) {
                      let htmlList = '';

                      let youtubeName1 = document.getElementById('youtubeName1');
                      let youtubeURL1 = document.getElementById('youtubeURL1');
                      if (youtubeName1.value !== '' || youtubeURL1.value !== '') {
                        htmlList += '<li><i class="fa-brands fa-youtube"></i> <a href="' + youtubeURL1.value + '">' + youtubeName1.value + '</a></li>\n';
                      }

                      let youtubeName2 = document.getElementById('youtubeName2');
                      let youtubeURL2 = document.getElementById('youtubeURL2');
                      if (youtubeName2.value !== '' || youtubeURL2.value !== '') {
                        htmlList += '<li><i class="fa-brands fa-youtube"></i> <a href="' + youtubeURL2.value + '">' + youtubeName2.value + '</a></li>\n';
                      }

                      let spotifyName = document.getElementById('spotifyName');
                      let spotifyURL = document.getElementById('spotifyURL');
                      if (spotifyName.value !== '' || spotifyURL.value !== '') {
                        htmlList += '<li><i class="fa-brands fa-spotify"></i> <a href="' + spotifyURL.value + '">' + spotifyName.value + '</a></li>\n';
                      }

                      let appleName = document.getElementById('appleName');
                      let appleURL = document.getElementById('appleURL');
                      if (appleName.value !== '' || appleURL.value !== '') {
                        htmlList += '<li><i class="fa-solid fa-podcast"></i> <a href="' + appleURL.value + '">' + appleName.value + '</a></li>\n';
                      }

                      let facebookName = document.getElementById('facebookName');
                      let facebookURL = document.getElementById('facebookURL');
                      if (facebookName.value !== '' || facebookURL.value !== '') {
                        htmlList += '<li><i class="fa-brands fa-facebook"></i> <a href="' + facebookURL.value + '">' + facebookName.value + '</a></li>\n';
                      }

                      let xName = document.getElementById('xName');
                      let xURL = document.getElementById('xURL');
                      if (xName.value !== '' || xURL.value !== '') {
                        htmlList += '<li><i class="fa-brands fa-x-twitter"></i> <a href="' + xURL.value + '">' + xName.value + '</a></li>\n';
                      }

                      let instagramName = document.getElementById('instagramName');
                      let instagramURL = document.getElementById('instagramURL');
                      if (instagramName.value !== '' || instagramURL.value !== '') {
                        htmlList += '<li><i class="fa-brands fa-instagram"></i> <a href="' + instagramURL.value + '">' + instagramName.value + '</a></li>\n';
                      }

                      let tiktokName = document.getElementById('tiktokName');
                      let tiktokURL = document.getElementById('tiktokURL');
                      if (tiktokName.value !== '' || tiktokURL.value !== '') {
                        htmlList += '<li><i class="fa-brands fa-tiktok"></i> <a href="' + tiktokURL.value + '">' + tiktokName.value + '</a></li>\n';
                      }

                      let threadsName = document.getElementById('threadsName');
                      let threadsURL = document.getElementById('threadsURL');
                      if (threadsName.value !== '' || threadsURL.value !== '') {
                        htmlList += '<li><i class="fa-brands fa-threads"></i> <a href="' + threadsURL.value + '">' + threadsName.value + '</a></li>\n';
                      }

                      let patreonName = document.getElementById('patreonName');
                      let patreonURL = document.getElementById('patreonURL');
                      if (patreonName.value !== '' || patreonURL.value !== '') {
                        htmlList += '<li><i class="fa-brands fa-patreon"></i> <a href="' + patreonURL.value + '">' + patreonName.value + '</a></li>\n';
                      }

                      let webName = document.getElementById('webName');
                      let webURL = document.getElementById('webURL');
                      if (webName.value !== '' || webURL.value !== '') {
                        htmlList += '<li><i class="fa-solid fa-globe"></i> <a href="' + webURL.value + '">' + webName.value + '</a></li>\n';
                      }

                      let mailName = document.getElementById('mailName');
                      let mailURL = document.getElementById('mailURL');
                      if (mailName.value !== '' || mailURL.value !== '') {
                        htmlList += '<li><i class="fa-solid fa-envelope-open"></i> <a href="mailto:' + mailURL.value + '">' + mailName.value + '</a></li>\n';
                      }

                      editor.insertContent('<h1 style="text-align: center;">Contacto y redes sociales</h1>\n' +
                        '<ul>\n' +
                        htmlList +
                        '</ul>\n' +
                        '<hr />' +
                        '&nbsp;');
                    },
                  });
                }
              },
              {
                text: 'Ficha técnica',
                icon: ' be-ico_youtube_data_table',
                onclick: function () {

                  editor.windowManager.open({
                    title: 'Ficha técnica',
                    body: [
                      {
                        type: 'textbox',
                        name: 'country',
                        id: 'country',
                        placeholder: 'México, España, Estados Unidos...',
                        label: 'País',
                        value: '',
                      },
                      {
                        type: 'label',
                        name: 'topic_',
                        id: 'topic_',
                        html: '<label for="topic">Tématica</label>' +
                          '<select id="topic" name="topic" ' +
                          'style="border: 1px solid #dcdcde;' +
                          'border-radius: 0;' +
                          'box-shadow: inset 0 1px 2px rgba(0, 0, 0, .07);' +
                          'padding: 0 28px 0 4px;' +
                          'margin-left: 51px;' +
                          'margin-bottom: 2px;' +
                          'width: 177px;' +
                          '-webkit-appearance: none;' +
                          'background: #fff url(data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2220%22%20height%3D%2220%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M5%206l5%205%205-5%202%201-7%207-7-7%202-1z%22%20fill%3D%22%23555%22%2F%3E%3C%2Fsvg%3E) no-repeat right 5px top 55%;' +
                          'background-size: 16px 16px;' +
                          'cursor: pointer;' +
                          'vertical-align: middle;">' +
                          '<option value="Enigmas y misterios">Enigmas y misterios</option>' +
                          '<option value="Paranormal">Paranormal</option>' +
                          '<option value="Realtos">Realtos</option>' +
                          '<option value="Historia">Historia</option>' +
                          '<option value="Crímenes">Crímenes</option>' +
                          '<option value="Ciencia">Ciencia</option>' +
                          '<option value="Política">Política</option>' +
                          '<option value="Economía">Economía</option>' +
                          '<option value="Geopolítica">Geopolítica</option>' +
                          '<option value="Documentales">Documentales</option>' +
                          '<option value="Documental">Documental</option>' +
                          '<option value="Historias">Historias</option>' +
                          '<option value="Misterios religosos">Misterios religosos</option>' +
                          '<option value="Política">Política</option>' +
                          '<option value="otro">Otro</option>' +
                          '</select>',
                      },
                      {
                        type: 'textbox',
                        name: 'writer',
                        id: 'writer',
                        placeholder: 'Autor',
                        label: 'Autor/es',
                        value: '',
                      },
                      {
                        type: 'textbox',
                        name: 'frequency',
                        id: 'frequency',
                        placeholder: 'Diario, semanal, mensual',
                        label: 'Frecuencia',
                        value: '',
                      },
                      {
                        type: 'textbox',
                        name: 'duration',
                        id: 'duration',
                        placeholder: '## min.',
                        label: 'Duración',
                        value: '',
                      },
                      {
                        type: 'textbox',
                        name: 'foundation',
                        id: 'foundation',
                        placeholder: '# de mes de ####',
                        label: 'Fundación',
                        value: '',
                      },

                      {
                        type: 'textbox',
                        name: 'subscribers',
                        id: 'subscribers',
                        placeholder: '#### k, M',
                        label: 'Suscriptores',
                        value: '',
                      },
                      {
                        type: 'textbox',
                        name: 'videos',
                        id: 'videos',
                        placeholder: '####',
                        label: 'Videos',
                        value: '',
                      },
                      {
                        type: 'textbox',
                        name: 'visits',
                        id: 'visits',
                        placeholder: '####',
                        label: 'Visitas',
                        value: '',
                      },
                    ],
                    onsubmit: function (e) {
                      let country = '';
                      let topic = '';
                      let writer = '';
                      let frequency = '';
                      let duration = '';
                      let foundation = '';
                      let subscribers = '';
                      let videos = '';
                      let visits = '';

                      topic = document.getElementById('topic');

                      if (e.data.country !== '') {
                        country += e.data.country;
                      } else {
                        country += 'Lorem';
                      }

                      if (e.data.writer !== '') {
                        writer += e.data.writer;
                      } else {
                        writer += 'Lorem';
                      }

                      if (e.data.frequency !== '') {
                        frequency += e.data.frequency;
                      } else {
                        frequency += 'Lorem';
                      }

                      if (e.data.duration !== '') {
                        duration += e.data.duration;
                      } else {
                        duration += 'Lorem';
                      }

                      if (e.data.foundation !== '') {
                        foundation += e.data.foundation;
                      } else {
                        foundation += 'Lorem';
                      }

                      if (e.data.subscribers !== '') {
                        subscribers += e.data.subscribers;
                      } else {
                        subscribers += 'Lorem';
                      }

                      if (e.data.videos !== '') {
                        videos += e.data.videos;
                      } else {
                        videos += 'Lorem';
                      }

                      if (e.data.visits !== '') {
                        visits += e.data.visits;
                      } else {
                        visits += 'Lorem';
                      }

                      editor.insertContent('<table style="font-size: 1.20em;">\n' +
                        '<tbody>\n' +
                        '<tr style="background: #2d2d2d !important; color: #dddddd;">\n' +
                        '<td style="background: #2d2d2d !important; text-align: center; font-weight: bold; color: #dddddd; text-shadow: 0 0 0 #000000;" colspan="2" width="599">FICHA TÉCNICA</td>\n' +
                        '</tr>\n' +
                        '<tr>\n' +
                        '<td style="background: #474747 !important; text-align: left; color: #dddddd;" width="20%">PAÍS</td>\n' +
                        '<td>' + country + '</td>\n' +
                        '</tr>\n' +
                        '<tr>\n' +
                        '<td style="background: #474747 !important; text-align: left; color: #dddddd;">PLATAFORMA</td>\n' +
                        '<td>YouTube</td>\n' +
                        '</tr>\n' +
                        '<tr>\n' +
                        '<td style="background: #474747 !important; text-align: left; color: #dddddd;">TEMÁTICA</td>\n' +
                        '<td>' + topic.value + '</td>\n' +
                        '</tr>\n' +
                        '<tr>\n' +
                        '<td style="background: #474747 !important; text-align: left; color: #dddddd;">FROMATO</td>\n' +
                        '<td>Vodcast</td>\n' +
                        '</tr>\n' +
                        '<tr>\n' +
                        '<td style="background: #474747 !important; text-align: left; color: #dddddd;">AUTOR/ES</td>\n' +
                        '<td>' + writer + '</td>\n' +
                        '</tr>\n' +
                        '<tr>\n' +
                        '<td style="background: #474747 !important; text-align: left; color: #dddddd;">FRECUENCIA</td>\n' +
                        '<td>' + frequency + '</td>\n' +
                        '</tr>\n' +
                        '<tr>\n' +
                        '<td style="background: #474747 !important; text-align: left; color: #dddddd;">DURACIÓN</td>\n' +
                        '<td width="226">' + duration + '</td>\n' +
                        '</tr>\n' +
                        '<tr>\n' +
                        '<td style="background: #474747 !important; text-align: left; color: #dddddd;">FUNDACIÓN</td>\n' +
                        '<td>' + foundation + '</td>\n' +
                        '</tr>\n' +
                        '<tr>\n' +
                        '<td style="background: #474747 !important; text-align: left; color: #dddddd;">SUSCRIPTORES</td>\n' +
                        '<td>' + subscribers + '</td>\n' +
                        '</tr>\n' +
                        '<tr>\n' +
                        '<td style="background: #474747 !important; text-align: left; color: #dddddd;">VIDEOS</td>\n' +
                        '<td>' + videos + ' videos</td>\n' +
                        '</tr>\n' +
                        '<tr>\n' +
                        '<td style="background: #474747 !important; text-align: left; color: #dddddd;">VISITAS</td>\n' +
                        '<td>' + visits + ' vistas</td>\n' +
                        '</tr>\n' +
                        '</tbody>\n' +
                        '</table>' +
                        '&nbsp;');
                    },
                  });
                }
              },

              {
                text: 'Actualización',
                icon: ' be-ico_youtube_update',
                onclick: function () {
                  const today = new Date();
                  const date = String(today.getDate()).padStart(2, '0') + '-' +
                    String(today.getMonth() + 1).padStart(2, '0') + '-' +
                    today.getFullYear();
                  editor.insertContent('<p style="text-align: center;">Actualización: <strong>' + date + '</strong></p>' +
                    '&nbsp;');
                }
              },

            ]
        }
        ,
      ]
    });
  });
})
();