
<link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
<section class="content container-fluid" id="app">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ en_name }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="btn-group" style="padding: 10px;">
              <a id="save_info" class="btn btn-success" onclick="save_info();">Save</a>
              <a id="app_info" class="btn btn-success" onclick="approve();">Approve</a>
              <a id="search_info" class="btn btn-primary" onclick="window.open('search_m_book.php?IDF=Master', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">Search</a>
              <a id="cancel_info" class="btn btn-danger" onclick="cancel_imb();">Cancel</a>
              
              
              
            </div>


                
            <!-- form start -->
            <form role="form">
              <div class="box-body col-md-12">


                
                <div class="form-group"></div>
               <div class="form-group" >
                <div class="col-sm-2">
                  <label for="exampleInputEmail1" >Reference No</label>
                  </div>
                  <div class="col-sm-2">
                  <input type="text" class="form-control" id="REF" v-model="REF" :disabled="true" placeholder="Reference No">
                  </div>

                  <div class="col-sm-2">
                    <label for="exampleInputEmail1"  id="app_status"></label>
                  </div>
                </div><br><br>







                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Category </label>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!-- <label>Select</label> -->
                            <select class="form-control" id="category_name">
                                <option value="SYL">Syllabus</option>
                                <option value="STA">Stationeries</option>
                                <option value="TB">Text Books</option>
                                <option value="NO">Novels</option>
                                <option value="KI">Kids</option>
                            </select>
                        </div>
                    </div>
                </div><br><br>

                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >School </label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="school_ref" placeholder="School Ref" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="school_name" placeholder="School Name" disabled>
                    </div>
                    <div class="col-md-2">
                    <a class="btn btn-default" onclick="window.open('search_m_school.php?IDF=item', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">...</a>
                  </div>
                </div><br><br>

                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Level</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="level_ref" placeholder="Level Ref" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="level_name" placeholder="Level Name" disabled>
                    </div>
                    <div class="col-md-2">
                    <a class="btn btn-default" onclick="window.open('search_m_level.php?IDF=item', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">...</a>
                  </div>
                </div><br><br>

               

                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Author</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="author_ref" placeholder="Author Ref" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="author_name" placeholder="Author Name" disabled>
                    </div>
                    <div class="col-md-2">
                    <a class="btn btn-default" onclick="window.open('search_m_author.php?IDF=item', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">...</a>
                  </div>
                </div><br><br>

                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Publisher </label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="publisher_ref" placeholder="Publisher Ref" disabled>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="publisher_name" placeholder="Publisher Name" disabled>
                    </div>
                    <div class="col-md-2">
                    <a class="btn btn-default" onclick="window.open('search_m_publisher.php?IDF=item', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">...</a>
                  </div>
                </div><br><br>

                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Item Name</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="item_name" placeholder="Item Name">
                    </div>
                </div><br><br>



                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Description</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="des" placeholder="Description">
                    </div>
                </div><br><br>

                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >ISBN</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="isbn" placeholder="ISBN">
                    </div>
                </div><br><br>




                <div class="form-group"></div>
                <div class="form-group">
                <div class="col-sm-2">
                  <label for="first_name">Logo upload</label>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <input type="file" id="img_file">
                    <input type="hidden" id="img_logo">

                    
                  </div>
                </div>
                </div><br><br>

                <div class="form-group"></div>
                <div class="form-group">
                <div class="col-sm-2">
                  <label for="first_name">Preview</label>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <div id=img_path></div>
                    
                  </div>
                </div>
                </div><br><br>


                <!-- <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Selling Price/Unit</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="selling_price" placeholder="Selling Price/Unit">
                    </div>
                </div><br><br>


                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name" >Quantity</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="quantity" placeholder="Quantity">
                    </div>
                </div><br><br> -->



               <div class="row">
                <div class="col-sm-8">


                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name">School</label>
                    </div>
                    <div class="col-md-2">
                    <a class="btn btn-default" onclick="window.open('search_m_school.php?IDF=ADD_SCHOOL', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">Add School</a>
                  </div>
                </div><br><br>




                  <table id="exampletable"  class='table table-bordered' style="width:100%">
                  <thead>
                      <tr>
                          <th>School Reference</th>
                          <th>School</th>
                          <th>Level Reference</th>
                          <th>Level</th>
                          <th>Add</th>
                          <th>Remove</th>
                      </tr>
                  </thead>
                  <tfoot>
                    
                  </tfoot>
                  </table>


              

                </div>

               </div>


                   <!-- <div class="row">
                <div class="col-sm-8">


                <div class="form-group"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="first_name">Level</label>
                    </div>
                    <div class="col-md-2">
                    <a class="btn btn-default" onclick="window.open('search_m_level.php?IDF=ADD_LEVEL', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">Add Level</a>
                  </div>
                </div><br><br>




                  <table id="exampletable1"  class='table table-bordered' style="width:100%">
                  <thead>
                      <tr>
                          <th>School Reference</th>
                          <th>Level</th>
                          <th>Remove</th>
                      </tr>
                  </thead>
                  <tfoot>
                    
                  </tfoot>
                  </table>


              

                </div>

               </div> -->







                


              </div>
              <!-- /.box-body -->

              <div class="box-footer">

              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
       


      </div>

</section>
<script src="js/m_book.js"></script>
<!-- <script>getdt();</script> -->


<script src="js/jquery-3.3.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.jqueryui.min.js"></script>
<!-- <script src="js/tableToJsonMini.js"></script>
<script src="js/tableToJson.js"></script> -->

<script type="text/javascript">
/*! table-to-json - v0.13.0 - Daniel White */
!function(a){"use strict";a.fn.tableToJSON=function(b){var c={ignoreColumns:[],onlyColumns:null,ignoreHiddenRows:!0,ignoreEmptyRows:!1,headings:null,allowHTML:!1,includeRowId:!1,textDataOverride:"data-override",extractor:null,textExtractor:null};b=a.extend(c,b);var d=function(a){return void 0!==a&&null!==a},e=function(a){return void 0!==a&&a.length>0},f=function(c){return d(b.onlyColumns)?-1===a.inArray(c,b.onlyColumns):-1!==a.inArray(c,b.ignoreColumns)},g=function(b,c){var f={},g=0;return a.each(c,function(a,c){g<b.length&&d(c)&&(e(b[g])&&(f[b[g]]=c),g++)}),f},h=function(c,d,e){var f,g=a(d),h=b.extractor||b.textExtractor,i=g.attr(b.textDataOverride);return null===h||e?a.trim(i||(b.allowHTML?g.html():d.textContent||g.text())||""):a.isFunction(h)?(f=i||h(c,g),"string"==typeof f?a.trim(f):f):"object"==typeof h&&a.isFunction(h[c])?(f=i||h[c](c,g),"string"==typeof f?a.trim(f):f):a.trim(i||(b.allowHTML?g.html():d.textContent||g.text())||"")},i=function(c,d){var e=[],f=b.includeRowId,g="boolean"==typeof f?f:"string"==typeof f,i="string"==typeof f==!0?f:"rowId";return g&&void 0===a(c).attr("id")&&e.push(i),a(c).children("td,th").each(function(a,b){e.push(h(a,b,d))}),e},j=function(a){var c=a.find("tr:first").first();return d(b.headings)?b.headings:i(c,!0)};return function(c,e){var i,j,k,l,m,n,o,p=[],q=0,r=[];return c.children("tbody,*").children("tr").each(function(c,e){if(c>0||d(b.headings)){var f=b.includeRowId,g="boolean"==typeof f?f:"string"==typeof f;n=a(e);var r=n.find("td").length===n.find("td:empty").length;!n.is(":visible")&&b.ignoreHiddenRows||r&&b.ignoreEmptyRows||n.data("ignore")&&"false"!==n.data("ignore")||(q=0,p[c]||(p[c]=[]),g&&(q+=1,void 0!==n.attr("id")?p[c].push(n.attr("id")):p[c].push("")),n.children().each(function(){for(o=a(this);p[c][q];)q++;if(o.filter("[rowspan]").length)for(k=parseInt(o.attr("rowspan"),10)-1,m=h(q,o),i=1;i<=k;i++)p[c+i]||(p[c+i]=[]),p[c+i][q]=m;if(o.filter("[colspan]").length)for(k=parseInt(o.attr("colspan"),10)-1,m=h(q,o),i=1;i<=k;i++)if(o.filter("[rowspan]").length)for(l=parseInt(o.attr("rowspan"),10),j=0;j<l;j++)p[c+j][q+i]=m;else p[c][q+i]=m;m=p[c][q]||h(q,o),d(m)&&(p[c][q]=m),q++}))}}),a.each(p,function(c,h){if(d(h)){var i=d(b.onlyColumns)||b.ignoreColumns.length?a.grep(h,function(a,b){return!f(b)}):h,j=d(b.headings)?e:a.grep(e,function(a,b){return!f(b)});m=g(j,i),r[r.length]=m}}),r}(this,j(this))}}(jQuery);
</script>

<script type="text/javascript">
 /**
 * table-to-json
 * jQuery plugin that reads an HTML table and returns a javascript object representing the values and columns of the table
 *
 * @author Daniel White
 * @copyright Daniel White 2017
 * @license MIT <https://github.com/lightswitch05/table-to-json/blob/master/MIT-LICENSE>
 * @link https://github.com/lightswitch05/table-to-json
 * @module table-to-json
 * @version 0.13.0
 */
(function( $ ) {
  'use strict';

  $.fn.tableToJSON = function(opts) {

    // Set options
    var defaults = {
      ignoreColumns: [],
      onlyColumns: null,
      ignoreHiddenRows: true,
      ignoreEmptyRows: false,
      headings: null,
      allowHTML: false,
      includeRowId: false,
      textDataOverride: 'data-override',
      extractor: null,
      textExtractor: null
    };
    opts = $.extend(defaults, opts);

    var notNull = function(value) {
      return value !== undefined && value !== null;
    };
    
    var notEmpty = function(value) {
      return value !== undefined && value.length > 0;
    };
    
    var ignoredColumn = function(index) {
      if( notNull(opts.onlyColumns) ) {
        return $.inArray(index, opts.onlyColumns) === -1;
      }
      return $.inArray(index, opts.ignoreColumns) !== -1;
    };

    var arraysToHash = function(keys, values) {
      var result = {}, index = 0;
      $.each(values, function(i, value) {
        // when ignoring columns, the header option still starts
        // with the first defined column
        if ( index < keys.length && notNull(value) ) {
          if (notEmpty(keys[index])){
            result[ keys[index] ] = value;
          }
          index++;
        }
      });
      return result;
    };

    var cellValues = function(cellIndex, cell, isHeader) {
      var $cell = $(cell),
        // extractor
        extractor = opts.extractor || opts.textExtractor,
        override = $cell.attr(opts.textDataOverride),
        value;
      // don't use extractor for header cells
      if ( extractor === null || isHeader ) {
        return $.trim( override || ( opts.allowHTML ? $cell.html() : cell.textContent || $cell.text() ) || '' );
      } else {
        // overall extractor function
        if ( $.isFunction(extractor) ) {
          value = override || extractor(cellIndex, $cell);
          return typeof value === 'string' ? $.trim( value ) : value;
        } else if ( typeof extractor === 'object' && $.isFunction( extractor[cellIndex] ) ) {
          value = override || extractor[cellIndex](cellIndex, $cell);
          return typeof value === 'string' ? $.trim( value ) : value;
        }
      }
      // fallback
      return $.trim( override || ( opts.allowHTML ? $cell.html() : cell.textContent || $cell.text() ) || '' );
    };

    var rowValues = function(row, isHeader) {
      var result = [];
      var includeRowId = opts.includeRowId;
      var useRowId = (typeof includeRowId === 'boolean') ? includeRowId : (typeof includeRowId === 'string') ? true : false;
      var rowIdName = (typeof includeRowId === 'string') === true ? includeRowId : 'rowId';
      if (useRowId) {
        if (typeof $(row).attr('id') === 'undefined') {
          result.push(rowIdName);
        }
      }
      $(row).children('td,th').each(function(cellIndex, cell) {
        result.push( cellValues(cellIndex, cell, isHeader) );
      });
      return result;
    };

    var getHeadings = function(table) {
      var firstRow = table.find('tr:first').first();
      return notNull(opts.headings) ? opts.headings : rowValues(firstRow, true);
    };

    var construct = function(table, headings) {
      var i, j, len, len2, txt, $row, $cell,
        tmpArray = [], cellIndex = 0, result = [];
      table.children('tbody,*').children('tr').each(function(rowIndex, row) {
        if( rowIndex > 0 || notNull(opts.headings) ) {
          var includeRowId = opts.includeRowId;
          var useRowId = (typeof includeRowId === 'boolean') ? includeRowId : (typeof includeRowId === 'string') ? true : false;

          $row = $(row);

          var isEmpty = ($row.find('td').length === $row.find('td:empty').length) ? true : false;

          if( ( $row.is(':visible') || !opts.ignoreHiddenRows ) && ( !isEmpty || !opts.ignoreEmptyRows ) && ( !$row.data('ignore') || $row.data('ignore') === 'false' ) ) {
            cellIndex = 0;
            if (!tmpArray[rowIndex]) {
              tmpArray[rowIndex] = [];
            }
            if (useRowId) {
              cellIndex = cellIndex + 1;
              if (typeof $row.attr('id') !== 'undefined') {
                tmpArray[rowIndex].push($row.attr('id'));
              } else {
                tmpArray[rowIndex].push('');
              }
            }

            $row.children().each(function(){
              $cell = $(this);
              // skip column if already defined
              while (tmpArray[rowIndex][cellIndex]) { cellIndex++; }

              // process rowspans
              if ($cell.filter('[rowspan]').length) {
                len = parseInt( $cell.attr('rowspan'), 10) - 1;
                txt = cellValues(cellIndex, $cell);
                for (i = 1; i <= len; i++) {
                  if (!tmpArray[rowIndex + i]) { tmpArray[rowIndex + i] = []; }
                  tmpArray[rowIndex + i][cellIndex] = txt;
                }
              }
              // process colspans
              if ($cell.filter('[colspan]').length) {
                len = parseInt( $cell.attr('colspan'), 10) - 1;
                txt = cellValues(cellIndex, $cell);
                for (i = 1; i <= len; i++) {
                  // cell has both col and row spans
                  if ($cell.filter('[rowspan]').length) {
                    len2 = parseInt( $cell.attr('rowspan'), 10);
                    for (j = 0; j < len2; j++) {
                      tmpArray[rowIndex + j][cellIndex + i] = txt;
                    }
                  } else {
                    tmpArray[rowIndex][cellIndex + i] = txt;
                  }
                }
              }

              txt = tmpArray[rowIndex][cellIndex] || cellValues(cellIndex, $cell);
              if (notNull(txt)) {
                tmpArray[rowIndex][cellIndex] = txt;
              }
              cellIndex++;
            });
          }
        }
      });
      $.each(tmpArray, function( i, row ){
        if (notNull(row)) {
          // remove ignoredColumns / add onlyColumns
          var newRow = notNull(opts.onlyColumns) || opts.ignoreColumns.length ?
            $.grep(row, function(v, index){ return !ignoredColumn(index); }) : row,

            // remove ignoredColumns / add onlyColumns if headings is not defined
            newHeadings = notNull(opts.headings) ? headings :
              $.grep(headings, function(v, index){ return !ignoredColumn(index); });

          txt = arraysToHash(newHeadings, newRow);
          result[result.length] = txt;
        }
      });
      return result;
    };

    // Run
    var headings = getHeadings(this);
    return construct(this, headings);
  };
})( jQuery );

</script>







