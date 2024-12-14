     <!-- page content -->
	 <style>
		 .dtree-wrapper *{
  box-sizing: border-box
}
.dtree-wrapper{
  position: relative;
  text-align: center;
  overflow: auto;
  padding: 10px;
  transition: 0.3s all ease;
}
.dtree-node-wrapper {
}
.dtree-node-cell {
  position: relative;
  text-align: center;
  z-index: 8;
  display: inline-block;
  white-space: nowrap;
  vertical-align: top;
  transition: 0.3s all ease;
}
.dtree-node{
  text-align: center;
  display: inline-block;
  padding: 10px 10px 20px 10px;
  box-shadow: 0px 0px 8px -2px #888;
}
.dtree-node-main{
  width: 100%;
  position: relative;
  padding-top: 1px;
}
.dtree-node .dtree-img img{
  max-width: 100%;
  max-width: 90px;
  border-radius: 50px;
  font-size: 0;
}
.dtree-node .dtree-branch{
  position: absolute;
  height: 1px;
  z-index: -1;
}
.dtree-node .dtree-branch.linex{
  width: 50%;
  right: 0;
  bottom: calc(100% - 1px);
  border-top: 1px solid #777;

}
.dtree-node .dtree-branch.liney{
  top: 0;
  height: 100%;
  left: 50%;
  width: 1px;
  border-left: 1px solid #777;
}
.dtree-child-container{
  position: relative;
  overflow: hidden;
  transition: 0.3s all ease;
  height: 100%;
}
.node-collapse {
  position: absolute;
  bottom: 0;
  background: white;
  color: #333;
  border: 1px solid #ccc;
  border-radius: 50%;
  left: calc(50% - 15px);
  width: 30px;
  height: 30px;
  font-size: 30px;
  line-height: 25px;
  cursor: pointer;
}
.node-collapse:after{
  content: "-";
}
.dtree-collapsed  .node-collapse:after{
  content: "+";
}
.dtree-collapsed.dtree-node .dtree-branch.liney{
  height: 50% !important;
}
.dtree-target-collapsed{
  opacity: 0;
  width: 0;
  height: 0;
  transform: scale(0) translateY(-100%)
}

.dtree-x .dtree-target-collapsed{
  transform: scale(0)  translateX(-100%)
}
.dtree-x .dtree-node-cell{
  text-align: left;
  display: block;
}
.dtree-x .dtree-child-container,
.dtree-x .dtree-node-main{
  display: inline-block;
  vertical-align: middle;
  width: auto;
}
.dtree-x .dtree-branch.linex{
  position: absolute;
  height: 1px;
  z-index: -1;
  right: auto;
  top: auto;
  left: 0;
  border: none;
  border-left: 1px solid #777;
}
.dtree-x .dtree-node .dtree-branch.liney{
  width: 100%;
  top: 50%;
  left: 0;
  border: none;
  border-top: 1px solid #777;
}
.dtree-x .node-collapse{
  bottom: auto;
  left: auto;
  right: 10px;
  top: calc(50% - 15px);
}

.dtree-x  .dtree-collapsed.dtree-node .dtree-branch.liney{
  height: auto !important;
  width : 50% !important;
}

.dtree-searchbox {
  max-width: 200px;
  text-align: left;
  position: relative;
  z-index: 11;
  background-color: white;
}
.dtree-search-icon {
  position: relative;
  display: inline-block;
  vertical-align: top;
  background-color: #eee;
  width: 25px;
  height: 25px;
  border: 1px solid #ccc;
}
.dtree-search-icon:before{
  content: "";
  position: absolute;
  top: 5px;
  left: 5px;
  width: 10px;
  height: 10px;
  border: 1px solid black;
  border-radius: 50%;
}
.dtree-search-icon:after{
  content: "";
  position: absolute;
  top: 11px;
  left: 15px;
  width: 1px;
  height: 10px;
  border-left: 2px solid black;
  border-radius: 50%;
  transform: rotate(-45deg);
}
input.dtree-search-control {
  display: inline-block;
  vertical-align: top;
  border: 1px solid #ccc;
  padding: 3px 5px;
  width: calc(100% - 25px);
}
.dtree-search-list {
  padding: 0;
  margin: 0;
  display: block;
  position: absolute;
  overflow: auto;
  top: 100%;
  left: 0;
  width: 100%;
  z-index: 99;
  background-color: white
}
.dtree-search-list li{
  padding : 5px 10px;
  border: 1px solid #ccc;
  border-top: none;
}
.dtree-search-list li:hover{
  background-color: #eee; 

}
/* basic template*/
.dtree-img,.dtree-name{
  display: inline-block;
  vertical-align: middle;
}
.dtree-node{
  background: white;
  border: 1px solid #ccc;
  border-top: 2px solid #2196f3;
  box-shadow: 0px 1px 10px -4px #999;
}
.dtree-name{
  font-size: 16px;
  font-weight: 600;
  width: calc(100% - 90px);
  padding: 10px;
  text-transform: capitalize;
  text-align: left
}
.dtree-name .sub{
  display: block;
  font-weight: 400;
  color: #555;
  font-size: 13px;
}
	 </style>
	 <script>
		 /*  plugin - dtree
    version - 1.0.0
*/

(function ($) {
    $.fn.dtree = function (options) {
        var $this = this,
            settings = $.extend({
                isHorizontal: false,
                customTemplate: false,
                gutter: 20,
                zoom: true,
                placeholderImg: "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg",
                isCollapsible: true,
                searchbox: true
            }, options),
            _parents = [],
            _nodeDims = {},
            _iniScale = 0,
            _domNodes = {},
            _dtreeID = $this.attr("id") || "dtree" + Math.round(Math.random() * 100),
            init = {
                logger: function () {
                    _parents = calc.getParentChildObj();
                    _nodeDims = init.getNodeDimensions();

                    $this.html(init.buildNodes(_nodeDims));
                    init.rearrangeDom();
                    init.setSelectors();
                    console.log(settings.nodes, _nodeDims, _parents);
                },
                buildNodes: function (nodeDims) {
                    if (settings.customTemplate) {

                    } else {
                        var activepid = _parents.rootNode.id,
                            pNodes = _parents.listParents.length,
                            ndPipe = [activepid],
                            nodeHTML = "<div class=\"dtree-wrapper " + (settings.isHorizontal ? 'dtree-x' : '') + "\">";

                        if (settings.searchbox) {
                            nodeHTML += "<div class=\"dtree-searchbox\"><input type=\"text\" class=\"dtree-search-control\"><i class=\"dtree-search-icon\"></i>" +
                                "<ul class=\"dtree-search-list\"></ul>" +
                                "</div>";
                        }


                        nodeHTML += "<div class=\"dtree-node-wrapper\" id=\"" + _dtreeID + "_node_0\" style=\"width:100%\">" +
                            "<div class=\"dtree-node-cell\">" +
                            "<div class=\"dtree-node-main\">" +
                            "<div class=\"dtree-node \" style=\"margin:" + settings.gutter + "px\">" +
                            "<div class=\"dtree-img\"><img src=\"" + (_parents.rootNode.img || settings.placeholderImg) + "\"></div>" +
                            "<div class=\"dtree-name\">" + _parents.rootNode.name + "<span class=\"sub\">" + _parents.rootNode.txt + "</span></div>" +
                            (settings.isCollapsible ? "<div class=\"node-collapse\" data-dtree-collpase-node=\"#" + _dtreeID + "_node_" + activepid + "\"  style=\"bottom : " + settings.gutter / 2 + "px\"></div>" : "");
                        nodeHTML += (settings.isHorizontal) ? "<i class=\"dtree-branch liney\" style=\"height:50%; top:50%; left: " + settings.gutter + "px; width: calc(100% - " + settings.gutter + "px)\"></i>" : "<i class=\"dtree-branch liney\" style=\"width:50%; left:50%; top: " + settings.gutter + "px; height: calc(100% - " + settings.gutter + "px)\"></i>";
                        nodeHTML += "</div></div><div class=\"dtree-child-container\" id=\"" + _dtreeID + "_node_" + activepid + "\"></div></div></div>";

                        while (pNodes && ndPipe.length) {
                            activepid = ndPipe.shift();
                            var childNdsObj = _parents.parentObj[_parents.listParents.indexOf(activepid)];
                            if (!childNdsObj) {
                                continue;
                            }
                            var childNds = childNdsObj.childNodes;

                            nodeHTML += "<div class=\"dtree-node-wrapper \" id=\"" + _dtreeID + "_parent_" + activepid + "\"  >";

                            for (var i = 0; i < childNds.length; i++) {
                                var isParent = (_parents.listParents.indexOf(childNds[i].id) !== -1),
                                    hasSiblings = childNds.length - 1,
                                    xRight = (i == 0) ? "0" : "50%",
                                    xWidth = "50%",
                                    isMiddle = (i > 0 && i < childNds.length - 1),
                                    imgSrc = childNds[i].img || settings.placeholderImg,
                                    parObj = _parents.parentObj[_parents.listParents.indexOf(childNds[i].id)],
                                    isCollapsedNode = childNds[i].isCollapsed;

                                if (isMiddle) {
                                    xWidth = "100%";
                                    xRight = "0";
                                }
                                settings.nodes[_parents.nodeById[childNds[i].id]].lvl = 1 + settings.nodes[_parents.nodeById[activepid]].lvl;
                                // width: 100/childNds.length
                                nodeHTML += "<div class=\"dtree-node-cell \"  >" +
                                    "<div class=\"dtree-node-main\">" +
                                    "<div class=\"dtree-node "+(isCollapsedNode && "dtree-collapsed")+"\" style=\"margin:" + settings.gutter + "px\">" +
                                    "<div class=\"dtree-img\"><img src=\"" + imgSrc + "\"></div>" +
                                    "<div class=\"dtree-name\">" + childNds[i].name + "<span class=\"sub\">" + childNds[i].txt + "</span></div>";
                                nodeHTML += isParent ? (settings.isCollapsible ? "<div class=\"node-collapse\" data-dtree-collpase-node=\"#" + _dtreeID + "_node_" + childNds[i].id + "\" style=\"bottom : " + settings.gutter / 2 + "px\"></div>" : "") : "";

                                if (settings.isHorizontal) {
                                    nodeHTML += (!isParent && parObj ? (parObj.childNodes.length > 1) : parObj) ? "<i class=\"dtree-branch liney\" ></i>" : "<i class=\"dtree-branch liney\" style=\"width:calc(100% - " + settings.gutter + "px); left: 0\"></i>";

                                } else {
                                    nodeHTML += (!isParent && parObj ? (parObj.childNodes.length > 1) : parObj) ? "<i class=\"dtree-branch liney\"></i>" : "<i class=\"dtree-branch liney\" style=\"height:calc(100% - " + settings.gutter + "px); top: 0\"></i>";
                                    nodeHTML += hasSiblings ? "<i class=\"dtree-branch linex\" style=\"right: " + xRight + "; width: " + xWidth + "\"></i>" : "";
                                }

                                nodeHTML += "</div></div>" +
                                    ((hasSiblings && (settings.isHorizontal)) ? "<i class=\"dtree-branch linex\" style=\"bottom: " + xRight + "; height: " + xWidth + "\"></i>" : "") +
                                    "<div class=\"dtree-child-container  "+(isCollapsedNode && "dtree-target-collapsed")+"\" id=\"" + _dtreeID + "_node_" + childNds[i].id + "\"></div></div>";
                                ndPipe.push(childNds[i].id);
                            }
                            nodeHTML += "</div>";
                            pNodes--;
                        }


                        return nodeHTML + "</div>";
                    }
                },
                rearrangeDom: function () {
                    var $parents = $this.find(".dtree-node-wrapper").not("#" + _dtreeID + "_node_0"),
                        $childs = $this.find(".dtree-child-container");

                    $parents.each(function () {
                        var custNodeId = $(this).attr("id").split("_"),
                            cutNode = $(this).detach(),
                            pasteNode = $childs.filter("#" + _dtreeID + "_node_" + custNodeId[custNodeId.length - 1]);
                        if (pasteNode) {
                            cutNode.appendTo(pasteNode);
                        }
                    });
                },
                getNodeDimensions: function () {
                    $('body').append("<div id=\"tempNode\"><div class=\"dtree-node\"><div class=\"dtree-img\"><img src=\"https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg\"></div> <div class=\"dtree-name\">mmmmmmmmmm</div><span class=\"dtree-branch\"><i></i><i></i></span></div></div>");
                    var $tempNode = $("#tempNode");
                    var tw = $tempNode.children().eq(0).outerWidth(true),
                        th = $tempNode.children().eq(0).outerHeight(true);

                    $tempNode.remove();
                    return {
                        nodeWidth: tw,
                        nodeHeight: th
                    };
                },
                setSelectors: function () {
                    _domNodes.nodes = $this.find(".dtree-node");
                    _domNodes.nodeContainers = $this.find(".dtree-node-main");
                    _domNodes.nodeCollapseToggles = $this.find(".node-collapse");
                    _domNodes.searchControl = $this.find(".dtree-search-control");
                    _domNodes.searchResults = $this.find(".dtree-search-list");

                    _domNodes.nodeCollapseToggles.on("click", handlers.onToggleCollapseClick);
                    _domNodes.searchControl.on("keyup", handlers.onSearchKeyup);
                    _domNodes.searchControl.on("blur", handlers.onSearchBlur);
                    $this.on("mousedown", handlers.onBoardMouseDown);
                    $this.on("mouseup", handlers.onBoardMouseUp);
                },
                buildSearchResults: function (listObj, skey) {
                    var listHTML = "";
                    for (var i = 0; i < listObj.length; i++) {
                        // var si = listObj[i].name.indexOf(skey) !== -1 ? listObj[i].name.indexOf(skey) : listObj[i].txt.indexOf(skey),
                        //     name = listObj[i]

                        listHTML += "<li>" + listObj[i].name + "</li>";
                    }

                    _domNodes.searchResults.html(listHTML);
                }
            },
            handlers = {
                onToggleCollapseClick: function (e) {
                    var $thisBtn = $(this),
                        $target = $($thisBtn.attr("data-dtree-collpase-node"));
                    $thisBtn.parent().toggleClass("dtree-collapsed");
                    $target.toggleClass("dtree-target-collapsed");
                },
                onSearchKeyup: function () {
                    var searchKey = $(this).val(),
                        resultSet = [];

                    resultSet = settings.nodes.filter(function (i, n) {
                        return (i.name.indexOf(searchKey) !== -1 || i.txt.indexOf(searchKey) !== -1);
                    });

                    init.buildSearchResults(resultSet, searchKey);
                },
                onSearchBlur: function () {
                    _domNodes.searchResults.html("");
                },
                onBoardMouseDown: function (e) {
                    _iniScale = e.offsetX;
                    $this.on("mousemove", handlers.onBoardMouseMove);
                },
                onBoardMouseUp: function (e) {
                    $this.off("mousemove", handlers.onBoardMouseMove);
                },
                onBoardMouseMove: function (e) {
                    e.preventDefault();
                    var pleft = _iniScale - e.offsetX;
                    $this.children().eq(0).scrollLeft($this.children().eq(0).scrollLeft() + pleft);
                },
                onScroll: function () {

                },
                onWheel: function (event) {
                    return;
                    event.preventDefault();
                    _iniScale = 0;
                    console.log(event.originalEvent);
                    if (!event.originalEvent.wheelDelta) {
                        if (event.deltaY < 0) {
                            _iniScale += 0.08;
                        } else {
                            _iniScale -= 0.05;
                        }
                    } else {
                        if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
                            _iniScale + 0.08;
                        } else {
                            _iniScale -= 0.05;
                        }
                    }

                    $this.children().eq(0).css("transform", "scale(" + _iniScale + ")");
                }
            },
            calc = {
                getParentChildObj: function () {
                    var nodes = settings.nodes,
                        keyNodeId = {},
                        parents = nodes.map(function (i, n) {
                            var childNd = nodes.filter(function (k) {
                                return k.pid == i.id
                            });
                            keyNodeId[i.id] = n;
                            return {
                                pid: i.id,
                                pname: i.name,
                                childNodes: childNd
                            }
                        }).filter(function (i) {
                            return i.childNodes.length
                        });

                    return {
                        parentObj: parents,
                        listParents: parents.map(function (i) {
                            return i.pid
                        }),
                        rootNode: nodes.filter(function (i) {
                            return i.pid == 0
                        })[0],
                        nodeById: keyNodeId
                    };
                }
            };

        init.logger();
        return $this;
    }
}(jQuery));
/* usage */
$(document).ready(function(){

var treeNodes = [{
        id: 8,
        pid: 5,
        name: "Gerak Melingkar",
        txt: "",
        
        img: "<?=base_url()?>gambar/gambar_web/fisika.png"
    },{
        id: 8,
        pid: 5,
        name: "Gerak Melingkar",
        txt: "",
        
        img: "<?=base_url()?>gambar/gambar_web/fisika.png"
    },{
        id: 7,
        pid: 5,
        name: "Gerak Lurus",
        txt: "",
        
        img: "<?=base_url()?>gambar/gambar_web/fisika.png"
    },{
        id: 6,
        pid: 3,
        name: "Aksi Reaksi",
        txt: "",
        
        img: "<?=base_url()?>gambar/gambar_web/fisika.png"
    },{
        id: 5,
        pid: 2,
        name: "Gaya",
        txt: "",
        
        img: "<?=base_url()?>gambar/gambar_web/fisika.png"
    },{
        id: 4,
        pid: 1,
        name: "Kelembaman",
        txt: "",
        
        img: "<?=base_url()?>gambar/gambar_web/fisika.png"
    },{
        id: 1,
        pid: 71,
        name: "Hukum Newton I",
        txt: "",
        
        img: "<?=base_url()?>gambar/gambar_web/fisika.png"
    },{
        id: 2,
        pid: 71,
        name: "Hukum Newton II",
        txt: "",
        
        img: "<?=base_url()?>gambar/gambar_web/fisika.png"
    },{
        id: 3,
        pid: 71,
        name: "Hukum Newton III",
        txt: "",
        
        img: "<?=base_url()?>gambar/gambar_web/fisika.png"
    },
    {
        id: 71,
        pid: 0,
        name: "Hukum Newton",
        txt: "",
        img: "<?=base_url()?>gambar/gambar_web/fisika.png"
    }];
  $("#chart").dtree({
    isHorizontal: false,
    nodes : treeNodes
  });
});
	 </script>
     <div class="right_col" role="main">
     	<div class="">
     		<div class="page-title">
     			<div class="title_left">
     				<h3>Maping Materi</h3>
     			</div>

     			<div class="title_right">
     				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
     					<div class="input-group">
     						<input type="text" class="form-control" placeholder="Search for...">
     						<span class="input-group-btn">
     							<button class="btn btn-default" type="button">Go!</button>
     						</span>
     					</div>
     				</div>
     			</div>
     		</div>

     		<div class="clearfix"></div>

     		<div class="row">
     			<div class="col-md-12 col-sm-12 col-xs-12">
     				<div class="x_panel">
     					<div class="x_title">
     						<h2>Maping Materi</h2>
     						<ul class="nav navbar-right panel_toolbox">
     							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
     							</li>
     							<li class="dropdown">
     								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
     									aria-expanded="false"><i class="fa fa-wrench"></i></a>
     								<ul class="dropdown-menu" role="menu">
     									<li><a href="#">Settings 1</a>
     									</li>
     									<li><a href="#">Settings 2</a>
     									</li>
     								</ul>
     							</li>
     							<li><a class="close-link"><i class="fa fa-close"></i></a>
     							</li>
     						</ul>
     						<div class="clearfix"></div>
     					</div>
     					<div class="x_content">

     						<div id="chart">
     							<!-- <div class="stiff-chart-inner text-white">
     								<div class="stiff-chart-level" data-level="01">
     									<div class="stiff-main-parent">
     										<ul>
     											<li data-parent="a">
     												<div class="">
     													<a href="#" class="btn btn-info">Hukum Newton</a>
     												</div>
     											</li>
     										</ul>
     									</div>
     								</div>
     								<div class="stiff-chart-level level-second" data-level="02">
     									<div class="stiff-child" data-child-from="a">
     										<ul>
     											<li data-parent="a1">
     												<div class="">
     													<a href="#" class="btn btn-info">Hukum I Newton</a>
     												</div>
     											</li>
     											<li data-parent="a2">
     												<div class="">
     													<a href="#" class="btn btn-info">Hukum II Newton</a>
     												</div>
     											</li>
     											<li data-parent="a3">
     												<div class="">
     													<a href="#" class="btn btn-info">Hukum III Newton</a>
     												</div>
     											</li>
     										</ul>
     									</div>
     								</div>
     								<div class="stiff-chart-level level-four" data-level="04">
     									<div class="stiff-child" data-child-from="a1">
     										<ul>
     											<li data-parent="a1-1">
     												<div class="">
     													<a href="#" class="btn btn-info">Materi 1 - 5</a>
     												</div>
     											</li>
     											<li data-parent="a1-2">
     												<div class="">
     													<a href="#" class="btn btn-info">Materi 6 - 10</a>
     												</div>
     											</li>
     											<li data-parent="a1-3">
     												<div class="">
     													<a href="#" class="btn btn-info">Materi 11</a>
     												</div>
     											</li>
     										</ul>
     									</div>
     								</div>
     								<div class="stiff-chart-level level-five" data-level="05">
     									<div class="stiff-child" data-child-from="a1-1">
     										<ul>
     											<li data-parent="a1-1-1">
     												<div>
     													<a href="" class="btn btn-success">1.Hakikat Ilmu Fisika</a>
     												</div>
     											</li>
     											<li data-parent="a1-1-2">
     												<div>
     													<a href="" class="btn btn-success">2.Besaran dan Pengukuran</a>
     												</div>
     											</li>
     											<li data-parent="a1-1-3">
     												<div>
     													<a href="" class="btn btn-success">3.Vektor</a>
     												</div>
     											</li>
     											<li data-parent="a1-1-4">
     												<div>
     													<a href="" class="btn btn-success">4.Gerak Lurus</a>
     												</div>
     											</li>
     											<li data-parent="a1-1-5">
     												<div>
     													<a href="" class="btn btn-success">5.Gerak Parabola</a>
     												</div>
     											</li>
     										</ul>
     									</div>
     								</div>
     								<div class="stiff-chart-level level-five" data-level="05">
     									<div class="stiff-child" data-child-from="a1-2">
     										<ul>
     											<li data-parent="a1-2-1">
     												<div>
     													<a href="" class="btn btn-success">6.Gerak Melingkar</a>
     												</div>
     											</li>
     											<li data-parent="a1-2-2">
     												<div>
     													<a href="" class="btn btn-success">7.Hukun Newton <br> Tentang
     														Gerak</a>
     												</div>
     											</li>
     											<li data-parent="a1-2-3">
     												<div>
     													<a href="" class="btn btn-success">8. Hukum Newton <br> Tentang
     														Gravitasi</a>
     												</div>
     											</li>
     											<li data-parent="a1-2-4">
     												<div>
     													<a href="" class="btn btn-success">9.Usaha dan Energi</a>
     												</div>
     											</li>
     											<li data-parent="a1-2-5">
     												<div>
     													<a href="" class="btn btn-success">10.Momentum dan Impuls</a>
     												</div>
     											</li>
     										</ul>
     									</div>
     								</div>
     								<div class="stiff-chart-level level-five" data-level="05">
     									<div class="stiff-child" data-child-from="a1-3">
     										<ul>
     											<li data-parent="a1-3-1">
     												<div>
     													<a href="" class="btn btn-success">11.Gerak Harmonis
     														Sederhana</a>
     												</div>
     											</li>
     										</ul>
     									</div>
     								</div>
     								<div class="stiff-chart-level level-four" data-level="04">
     									<div class="stiff-child" data-child-from="a2">
     										<ul>
     											<li data-parent="a2-1">
     												<div class="">
     													<a href="#" class="btn btn-info">Materi 1 - 5</a>
     												</div>
     											</li>
     											<li data-parent="a2-2">
     												<div class="">
     													<a href="#" class="btn btn-info">Materi 6 - 10</a>
     												</div>
     											</li>
     											<li data-parent="a2-3">
     												<div class="">
     													<a href="#" class="btn btn-info">Materi 11 - 12</a>
     												</div>
     											</li>
     										</ul>
     									</div>
									 </div>
     								<div class="stiff-chart-level level-five" data-level="05">
										<div class="stiff-child" data-child-from="a2-1">
											<ul>
												<li data-parent="a2-1-1">
													<div>
														<a href="" class="btn btn-success">1.Dinamika Rotasi <br> dan Kesetimbangan</a>
													</div>
												</li>
												<li data-parent="a2-1-2">
													<div>
														<a href="" class="btn btn-success">2.Elastisitas Bahan</a>
													</div>
												</li>
												<li data-parent="a2-1-3">
													<div>
														<a href="" class="btn btn-success">3.Fluida Statis</a>
													</div>
												</li>
												<li data-parent="a2-1-4">
													<div>
														<a href="" class="btn btn-success">4.Fluida Dinamis</a>
													</div>
												</li>
												<li data-parent="a2-1-5">
													<div>
														<a href="" class="btn btn-success">5.Kalor</a>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="stiff-chart-level level-five" data-level="05">
									   <div class="stiff-child" data-child-from="a2-2">
										   <ul>
											   <li data-parent="a2-2-1">
												   <div>
													   <a href="" class="btn btn-success">6.Teori Kinetik Gas</a>
												   </div>
											   </li>
											   <li data-parent="a2-2-2">
												   <div>
													   <a href="" class="btn btn-success">7.Termodinamika</a>
												   </div>
											   </li>
											   <li data-parent="a2-2-3">
												   <div>
													   <a href="" class="btn btn-success">8.Gelombang Mekanik</a>
												   </div>
											   </li>
											   <li data-parent="a2-2-4">
												   <div>
													   <a href="" class="btn btn-success">9.Gelombang Berjalan</a>
												   </div>
											   </li>
											   <li data-parent="a2-2-5">
												   <div>
													   <a href="" class="btn btn-success">10.Gelombang <br> Cahaya dan Bunyi</a>
												   </div>
											   </li>
										   </ul>
									   </div>
								   </div>
								   
								   <div class="stiff-chart-level level-five" data-level="05">
									<div class="stiff-child" data-child-from="a2-3">
										<ul>
											<li data-parent="a2-3-1">
												<div>
													<a href="" class="btn btn-success">11.Alat Optik</a>
												</div>
											</li>
											<li data-parent="a2-3-2">
												<div>
													<a href="" class="btn btn-success">12.Pemanasan Global</a>
												</div>
											</li>
										</ul>
									</div>
								</div>
     								<div class="stiff-chart-level level-four" data-level="04">
     									<div class="stiff-child" data-child-from="a3">
     										<ul>
     											<li data-parent="a3-1">
     												<div class="">
     													<a href="#" class="btn btn-info">Materi 1 - 5</a>
     												</div>
     											</li>
     											<li data-parent="a3-2">
     												<div class="">
     													<a href="#" class="btn btn-info">Materi 6 - 10</a>
     												</div>
     											</li>
     											<li data-parent="a3-3">
     												<div class="">
     													<a href="#" class="btn btn-info">Materi 11</a>
     												</div>
     											</li>
     										</ul>
     									</div>
									 </div>
									 
     								<div class="stiff-chart-level level-five" data-level="05">
										<div class="stiff-child" data-child-from="a3-1">
											<ul>
												<li data-parent="a3-1-1">
													<div>
														<a href="" class="btn btn-success">1.Listrik Searah</a>
													</div>
												</li>
												<li data-parent="a3-1-2">
													<div>
														<a href="" class="btn btn-success">2.Listrik Statis</a>
													</div>
												</li>
												<li data-parent="a3-1-3">
													<div>
														<a href="" class="btn btn-success">3.Induksi Magnetik</a>
													</div>
												</li>
												<li data-parent="a3-1-4">
													<div>
														<a href="" class="btn btn-success">4.Induksi Elektomagnetik</a>
													</div>
												</li>
												<li data-parent="a3-1-5">
													<div>
														<a href="" class="btn btn-success">5.Arus Bolak Balik</a>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="stiff-chart-level level-five" data-level="05">
										<div class="stiff-child" data-child-from="a3-2">
											<ul>
												<li data-parent="a3-2-1">
													<div>
														<a href="" class="btn btn-success">6.Gelombang Elektronik</a>
													</div>
												</li>
												<li data-parent="a3-2-2">
													<div>
														<a href="" class="btn btn-success">7.Teori Relativitas Khusus</a>
													</div>
												</li>
												<li data-parent="a3-2-3">
													<div>
														<a href="" class="btn btn-success">8.Radiasi Benda Hita,</a>
													</div>
												</li>
												<li data-parent="a3-2-4">
													<div>
														<a href="" class="btn btn-success">9.Transmisi Data Analog <br> dan Digital</a>
													</div>
												</li>
												<li data-parent="a3-2-5">
													<div>
														<a href="" class="btn btn-success">10.Radioaktivitas</a>
													</div>
												</li>
											</ul>
										</div>
									</div>
									
									<div class="stiff-chart-level level-five" data-level="05">
										<div class="stiff-child" data-child-from="a3-3">
											<ul>
												<li data-parent="a2-2-1">
													<div>
														<a href="" class="btn btn-success">11.Energi Terbarukan</a>
													</div>
												</li>
											</ul>
										</div>
									</div>
     							</div> -->
     						</div>
     					</div>
     				</div>
     			</div>
     		</div>
     	</div>
     </div>
     <!-- /page content -->
