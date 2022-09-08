if (typeof __coverage__ === 'undefined') { __coverage__ = {}; }
if (!__coverage__['build/series-column/series-column.js']) {
   __coverage__['build/series-column/series-column.js'] = {"path":"build/series-column/series-column.js","s":{"1":0,"2":0,"3":0,"4":0,"5":0,"6":0,"7":0,"8":0,"9":0,"10":0,"11":0,"12":0,"13":0,"14":0,"15":0,"16":0,"17":0,"18":0,"19":0,"20":0,"21":0,"22":0,"23":0,"24":0,"25":0,"26":0,"27":0,"28":0,"29":0,"30":0,"31":0},"b":{"1":[0,0],"2":[0,0],"3":[0,0],"4":[0,0],"5":[0,0],"6":[0,0],"7":[0,0],"8":[0,0],"9":[0,0],"10":[0,0]},"f":{"1":0,"2":0,"3":0},"fnMap":{"1":{"name":"(anonymous_1)","line":1,"loc":{"start":{"line":1,"column":25},"end":{"line":1,"column":44}}},"2":{"name":"(anonymous_2)","line":33,"loc":{"start":{"line":33,"column":26},"end":{"line":34,"column":4}}},"3":{"name":"(anonymous_3)","line":59,"loc":{"start":{"line":59,"column":23},"end":{"line":60,"column":4}}}},"statementMap":{"1":{"start":{"line":1,"column":0},"end":{"line":160,"column":74}},"2":{"start":{"line":21,"column":0},"end":{"line":157,"column":3}},"3":{"start":{"line":35,"column":8},"end":{"line":37,"column":10}},"4":{"start":{"line":38,"column":8},"end":{"line":47,"column":9}},"5":{"start":{"line":40,"column":12},"end":{"line":40,"column":32}},"6":{"start":{"line":41,"column":12},"end":{"line":41,"column":68}},"7":{"start":{"line":45,"column":12},"end":{"line":45,"column":44}},"8":{"start":{"line":46,"column":12},"end":{"line":46,"column":64}},"9":{"start":{"line":48,"column":8},"end":{"line":48,"column":22}},"10":{"start":{"line":61,"column":8},"end":{"line":110,"column":9}},"11":{"start":{"line":63,"column":12},"end":{"line":79,"column":23}},"12":{"start":{"line":80,"column":12},"end":{"line":80,"column":122}},"13":{"start":{"line":81,"column":12},"end":{"line":81,"column":85}},"14":{"start":{"line":82,"column":12},"end":{"line":82,"column":89}},"15":{"start":{"line":83,"column":12},"end":{"line":83,"column":93}},"16":{"start":{"line":84,"column":12},"end":{"line":84,"column":56}},"17":{"start":{"line":85,"column":12},"end":{"line":85,"column":77}},"18":{"start":{"line":86,"column":12},"end":{"line":86,"column":37}},"19":{"start":{"line":87,"column":12},"end":{"line":97,"column":13}},"20":{"start":{"line":89,"column":16},"end":{"line":89,"column":48}},"21":{"start":{"line":90,"column":16},"end":{"line":90,"column":72}},"22":{"start":{"line":91,"column":16},"end":{"line":91,"column":74}},"23":{"start":{"line":92,"column":16},"end":{"line":95,"column":17}},"24":{"start":{"line":94,"column":20},"end":{"line":94,"column":40}},"25":{"start":{"line":96,"column":16},"end":{"line":96,"column":39}},"26":{"start":{"line":98,"column":12},"end":{"line":109,"column":13}},"27":{"start":{"line":100,"column":16},"end":{"line":100,"column":61}},"28":{"start":{"line":101,"column":16},"end":{"line":108,"column":17}},"29":{"start":{"line":103,"column":20},"end":{"line":103,"column":42}},"30":{"start":{"line":104,"column":20},"end":{"line":107,"column":21}},"31":{"start":{"line":106,"column":24},"end":{"line":106,"column":66}}},"branchMap":{"1":{"line":38,"type":"if","locations":[{"start":{"line":38,"column":8},"end":{"line":38,"column":8}},{"start":{"line":38,"column":8},"end":{"line":38,"column":8}}]},"2":{"line":61,"type":"if","locations":[{"start":{"line":61,"column":8},"end":{"line":61,"column":8}},{"start":{"line":61,"column":8},"end":{"line":61,"column":8}}]},"3":{"line":61,"type":"binary-expr","locations":[{"start":{"line":61,"column":11},"end":{"line":61,"column":24}},{"start":{"line":61,"column":28},"end":{"line":61,"column":44}}]},"4":{"line":72,"type":"cond-expr","locations":[{"start":{"line":72,"column":47},"end":{"line":72,"column":70}},{"start":{"line":72,"column":73},"end":{"line":72,"column":74}}]},"5":{"line":80,"type":"cond-expr","locations":[{"start":{"line":80,"column":63},"end":{"line":80,"column":87}},{"start":{"line":80,"column":90},"end":{"line":80,"column":121}}]},"6":{"line":80,"type":"binary-expr","locations":[{"start":{"line":80,"column":27},"end":{"line":80,"column":42}},{"start":{"line":80,"column":46},"end":{"line":80,"column":60}}]},"7":{"line":92,"type":"if","locations":[{"start":{"line":92,"column":16},"end":{"line":92,"column":16}},{"start":{"line":92,"column":16},"end":{"line":92,"column":16}}]},"8":{"line":101,"type":"if","locations":[{"start":{"line":101,"column":16},"end":{"line":101,"column":16}},{"start":{"line":101,"column":16},"end":{"line":101,"column":16}}]},"9":{"line":104,"type":"if","locations":[{"start":{"line":104,"column":20},"end":{"line":104,"column":20}},{"start":{"line":104,"column":20},"end":{"line":104,"column":20}}]},"10":{"line":104,"type":"binary-expr","locations":[{"start":{"line":104,"column":23},"end":{"line":104,"column":31}},{"start":{"line":104,"column":35},"end":{"line":104,"column":57}}]}},"code":["(function () { YUI.add('series-column', function (Y, NAME) {","","/**"," * Provides functionality for creating a column series."," *"," * @module charts"," * @submodule series-column"," */","/**"," * The ColumnSeries class renders columns positioned horizontally along a category or time axis. The columns'"," * lengths are proportional to the values they represent along a vertical axis."," * and the relevant data points."," *"," * @class ColumnSeries"," * @extends MarkerSeries"," * @uses Histogram"," * @constructor"," * @param {Object} config (optional) Configuration parameters."," * @submodule series-column"," */","Y.ColumnSeries = Y.Base.create(\"columnSeries\", Y.MarkerSeries, [Y.Histogram], {","    /**","     * Helper method for calculating the size of markers.","     *","     * @method _getMarkerDimensions","     * @param {Number} xcoord The x-coordinate representing the data point for the marker.","     * @param {Number} ycoord The y-coordinate representing the data point for the marker.","     * @param {Number} calculatedSize The calculated size for the marker. For a `BarSeries` is it the width. For a `ColumnSeries` it is the height.","     * @param {Number} offset Distance of position offset dictated by other marker series in the same graph.","     * @return Object","     * @private","     */","    _getMarkerDimensions: function(xcoord, ycoord, calculatedSize, offset)","    {","        var config = {","            left: xcoord + offset","        };","        if(this._bottomOrigin >= ycoord)","        {","            config.top = ycoord;","            config.calculatedSize = this._bottomOrigin - config.top;","        }","        else","        {","            config.top = this._bottomOrigin;","            config.calculatedSize = ycoord - this._bottomOrigin;","        }","        return config;","    },","","    /**","     * Resizes and positions markers based on a mouse interaction.","     *","     * @method updateMarkerState","     * @param {String} type state of the marker","     * @param {Number} i index of the marker","     * @protected","     */","    updateMarkerState: function(type, i)","    {","        if(this._markers && this._markers[i])","        {","            var styles = this._copyObject(this.get(\"styles\").marker),","                markerStyles,","                state = this._getState(type),","                xcoords = this.get(\"xcoords\"),","                ycoords = this.get(\"ycoords\"),","                marker = this._markers[i],","                markers,","                seriesStyles,","                seriesCollection = this.get(\"seriesTypeCollection\"),","                seriesLen = seriesCollection ? seriesCollection.length : 0,","                seriesSize = 0,","                offset = 0,","                renderer,","                n = 0,","                xs = [],","                order = this.get(\"order\"),","                config;","            markerStyles = state === \"off\" || !styles[state] ? this._copyObject(styles) : this._copyObject(styles[state]);","            markerStyles.fill.color = this._getItemColor(markerStyles.fill.color, i);","            markerStyles.border.color = this._getItemColor(markerStyles.border.color, i);","            config = this._getMarkerDimensions(xcoords[i], ycoords[i], styles.width, offset);","            markerStyles.height = config.calculatedSize;","            markerStyles.width = Math.min(this._maxSize, markerStyles.width);","            marker.set(markerStyles);","            for(; n < seriesLen; ++n)","            {","                xs[n] = xcoords[i] + seriesSize;","                seriesStyles = seriesCollection[n].get(\"styles\").marker;","                seriesSize += Math.min(this._maxSize, seriesStyles.width);","                if(order > n)","                {","                    offset = seriesSize;","                }","                offset -= seriesSize/2;","            }","            for(n = 0; n < seriesLen; ++n)","            {","                markers = seriesCollection[n].get(\"markers\");","                if(markers)","                {","                    renderer = markers[i];","                    if(renderer && renderer !== undefined)","                    {","                        renderer.set(\"x\", (xs[n] - seriesSize/2));","                    }","                }","            }","        }","    }","}, {","    ATTRS: {","        /**","         * Read-only attribute indicating the type of series.","         *","         * @attribute type","         * @type String","         * @readOnly","         * @default column","         */","        type: {","            value: \"column\"","        }","","        /**","         * Style properties used for drawing markers. This attribute is inherited from `MarkerSeries`. Below are the default values:","         *  <dl>","         *      <dt>fill</dt><dd>A hash containing the following values:","         *          <dl>","         *              <dt>color</dt><dd>Color of the fill. The default value is determined by the order of the series on the graph. The color","         *              will be retrieved from the below array:<br/>","         *              `[\"#66007f\", \"#a86f41\", \"#295454\", \"#996ab2\", \"#e8cdb7\", \"#90bdbd\",\"#000000\",\"#c3b8ca\", \"#968373\", \"#678585\"]`","         *              </dd>","         *              <dt>alpha</dt><dd>Number from 0 to 1 indicating the opacity of the marker fill. The default value is 1.</dd>","         *          </dl>","         *      </dd>","         *      <dt>border</dt><dd>A hash containing the following values:","         *          <dl>","         *              <dt>color</dt><dd>Color of the border. The default value is determined by the order of the series on the graph. The color","         *              will be retrieved from the below array:<br/>","         *              `[\"#205096\", \"#b38206\", \"#000000\", \"#94001e\", \"#9d6fa0\", \"#e55b00\", \"#5e85c9\", \"#adab9e\", \"#6ac291\", \"#006457\"]`","         *              <dt>alpha</dt><dd>Number from 0 to 1 indicating the opacity of the marker border. The default value is 1.</dd>","         *              <dt>weight</dt><dd>Number indicating the width of the border. The default value is 1.</dd>","         *          </dl>","         *      </dd>","         *      <dt>width</dt><dd>indicates the width of the marker. The default value is 12.</dd>","         *      <dt>over</dt><dd>hash containing styles for markers when highlighted by a `mouseover` event. The default","         *      values for each style is null. When an over style is not set, the non-over value will be used. For example,","         *      the default value for `marker.over.fill.color` is equivalent to `marker.fill.color`.</dd>","         *  </dl>","         *","         * @attribute styles","         * @type Object","         */","    }","});","","","}, 'patched-v3.18.1', {\"requires\": [\"series-marker\", \"series-histogram-base\"]});","","}());"]};
}
var __cov_r2HuglAtb7O7hv2uzf1iMg = __coverage__['build/series-column/series-column.js'];
__cov_r2HuglAtb7O7hv2uzf1iMg.s['1']++;YUI.add('series-column',function(Y,NAME){__cov_r2HuglAtb7O7hv2uzf1iMg.f['1']++;__cov_r2HuglAtb7O7hv2uzf1iMg.s['2']++;Y.ColumnSeries=Y.Base.create('columnSeries',Y.MarkerSeries,[Y.Histogram],{_getMarkerDimensions:function(xcoord,ycoord,calculatedSize,offset){__cov_r2HuglAtb7O7hv2uzf1iMg.f['2']++;__cov_r2HuglAtb7O7hv2uzf1iMg.s['3']++;var config={left:xcoord+offset};__cov_r2HuglAtb7O7hv2uzf1iMg.s['4']++;if(this._bottomOrigin>=ycoord){__cov_r2HuglAtb7O7hv2uzf1iMg.b['1'][0]++;__cov_r2HuglAtb7O7hv2uzf1iMg.s['5']++;config.top=ycoord;__cov_r2HuglAtb7O7hv2uzf1iMg.s['6']++;config.calculatedSize=this._bottomOrigin-config.top;}else{__cov_r2HuglAtb7O7hv2uzf1iMg.b['1'][1]++;__cov_r2HuglAtb7O7hv2uzf1iMg.s['7']++;config.top=this._bottomOrigin;__cov_r2HuglAtb7O7hv2uzf1iMg.s['8']++;config.calculatedSize=ycoord-this._bottomOrigin;}__cov_r2HuglAtb7O7hv2uzf1iMg.s['9']++;return config;},updateMarkerState:function(type,i){__cov_r2HuglAtb7O7hv2uzf1iMg.f['3']++;__cov_r2HuglAtb7O7hv2uzf1iMg.s['10']++;if((__cov_r2HuglAtb7O7hv2uzf1iMg.b['3'][0]++,this._markers)&&(__cov_r2HuglAtb7O7hv2uzf1iMg.b['3'][1]++,this._markers[i])){__cov_r2HuglAtb7O7hv2uzf1iMg.b['2'][0]++;__cov_r2HuglAtb7O7hv2uzf1iMg.s['11']++;var styles=this._copyObject(this.get('styles').marker),markerStyles,state=this._getState(type),xcoords=this.get('xcoords'),ycoords=this.get('ycoords'),marker=this._markers[i],markers,seriesStyles,seriesCollection=this.get('seriesTypeCollection'),seriesLen=seriesCollection?(__cov_r2HuglAtb7O7hv2uzf1iMg.b['4'][0]++,seriesCollection.length):(__cov_r2HuglAtb7O7hv2uzf1iMg.b['4'][1]++,0),seriesSize=0,offset=0,renderer,n=0,xs=[],order=this.get('order'),config;__cov_r2HuglAtb7O7hv2uzf1iMg.s['12']++;markerStyles=(__cov_r2HuglAtb7O7hv2uzf1iMg.b['6'][0]++,state==='off')||(__cov_r2HuglAtb7O7hv2uzf1iMg.b['6'][1]++,!styles[state])?(__cov_r2HuglAtb7O7hv2uzf1iMg.b['5'][0]++,this._copyObject(styles)):(__cov_r2HuglAtb7O7hv2uzf1iMg.b['5'][1]++,this._copyObject(styles[state]));__cov_r2HuglAtb7O7hv2uzf1iMg.s['13']++;markerStyles.fill.color=this._getItemColor(markerStyles.fill.color,i);__cov_r2HuglAtb7O7hv2uzf1iMg.s['14']++;markerStyles.border.color=this._getItemColor(markerStyles.border.color,i);__cov_r2HuglAtb7O7hv2uzf1iMg.s['15']++;config=this._getMarkerDimensions(xcoords[i],ycoords[i],styles.width,offset);__cov_r2HuglAtb7O7hv2uzf1iMg.s['16']++;markerStyles.height=config.calculatedSize;__cov_r2HuglAtb7O7hv2uzf1iMg.s['17']++;markerStyles.width=Math.min(this._maxSize,markerStyles.width);__cov_r2HuglAtb7O7hv2uzf1iMg.s['18']++;marker.set(markerStyles);__cov_r2HuglAtb7O7hv2uzf1iMg.s['19']++;for(;n<seriesLen;++n){__cov_r2HuglAtb7O7hv2uzf1iMg.s['20']++;xs[n]=xcoords[i]+seriesSize;__cov_r2HuglAtb7O7hv2uzf1iMg.s['21']++;seriesStyles=seriesCollection[n].get('styles').marker;__cov_r2HuglAtb7O7hv2uzf1iMg.s['22']++;seriesSize+=Math.min(this._maxSize,seriesStyles.width);__cov_r2HuglAtb7O7hv2uzf1iMg.s['23']++;if(order>n){__cov_r2HuglAtb7O7hv2uzf1iMg.b['7'][0]++;__cov_r2HuglAtb7O7hv2uzf1iMg.s['24']++;offset=seriesSize;}else{__cov_r2HuglAtb7O7hv2uzf1iMg.b['7'][1]++;}__cov_r2HuglAtb7O7hv2uzf1iMg.s['25']++;offset-=seriesSize/2;}__cov_r2HuglAtb7O7hv2uzf1iMg.s['26']++;for(n=0;n<seriesLen;++n){__cov_r2HuglAtb7O7hv2uzf1iMg.s['27']++;markers=seriesCollection[n].get('markers');__cov_r2HuglAtb7O7hv2uzf1iMg.s['28']++;if(markers){__cov_r2HuglAtb7O7hv2uzf1iMg.b['8'][0]++;__cov_r2HuglAtb7O7hv2uzf1iMg.s['29']++;renderer=markers[i];__cov_r2HuglAtb7O7hv2uzf1iMg.s['30']++;if((__cov_r2HuglAtb7O7hv2uzf1iMg.b['10'][0]++,renderer)&&(__cov_r2HuglAtb7O7hv2uzf1iMg.b['10'][1]++,renderer!==undefined)){__cov_r2HuglAtb7O7hv2uzf1iMg.b['9'][0]++;__cov_r2HuglAtb7O7hv2uzf1iMg.s['31']++;renderer.set('x',xs[n]-seriesSize/2);}else{__cov_r2HuglAtb7O7hv2uzf1iMg.b['9'][1]++;}}else{__cov_r2HuglAtb7O7hv2uzf1iMg.b['8'][1]++;}}}else{__cov_r2HuglAtb7O7hv2uzf1iMg.b['2'][1]++;}}},{ATTRS:{type:{value:'column'}}});},'patched-v3.18.1',{'requires':['series-marker','series-histogram-base']});
