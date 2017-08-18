function callback(a) {
	var b = Public.getDefaultPage(),
		c = $("#grid").jqGrid("getGridParam", "selrow");
	if (c && c.length > 0) {
		var d = $("#grid").jqGrid("getRowData", c);
		d.id = c;
		var e = d.number + " " + d.name,
			f = parent.THISPAGE.$_customer;
		f.find("input").val(e), f.data("contactInfo", d), api.data.type && b.SYSTEM[api.data.type].push(d);
		var g = f.data("callback");
		"function" == typeof g && g(d)
	}
}
var urlParam = Public.urlParam(),
	zTree, multiselect = urlParam.multiselect || !0,
	defaultPage = Public.getDefaultPage(),
	SYSTEM = defaultPage.SYSTEM,
	taxRequiredCheck = SYSTEM.taxRequiredCheck,
	taxRequiredInput = SYSTEM.taxRequiredInput,
	api = frameElement.api,
	data = api.data || {},
	queryConditions = {
		skey: api.data.skey || "",
		isDelete: data.isDelete || 0
	},
	THISPAGE = {
		init: function(a) {
			this.initDom(), this.loadGrid(), this.addEvent()
		},
		initDom: function() {
			this.$_matchCon = $("#matchCon"), this.$_matchCon.placeholder(), this.$_catorage = $("#catorage"), queryConditions.skey && this.$_matchCon.val(queryConditions.skey);
			var a = "customertype",
				b = "选择客户类别";
			"10" === urlParam.type && (a = "supplytype", b = "选择供应商类别"), this.catorageCombo = Business.categoryCombo(this.$_catorage, {
				editable: !1,
				extraListHtml: "",
				addOptions: {
					value: -1,
					text: b
				},
				defaultSelected: 0,
				trigger: !0,
				width: 120
			}, a)
		},
		loadGrid: function() {
			var a = "../basedata/contact?action=list";
			"10" === urlParam.type && (a += "&type=10");
			var b = ($(window).height() - $(".grid-wrap").offset().top - 84, [{
				name: "customerType",
				label: "类别",
				index: "customerType",
				width: 100,
				title: !1
			}, {
				name: "number",
				label: "编号",
				index: "number",
				width: 100,
				title: !1
			}, {
				name: "name",
				label: "名称",
				index: "name",
				width: 220,
				classes: "ui-ellipsis"
			}, {
				name: "contacter",
				label: "联系人",
				index: "contacter",
				width: 100,
				align: "center",
				classes: "ui-ellipsis"
			}, {
				name: "mobile",
				label: "手机",
				index: "mobile",
				width: 100,
				align: "center",
				title: !1
			}, {
				name: "cLevel",
				label: "cLevel",
				hidden: !0
			}]);
			$("#grid").jqGrid({
				url: a,
				postData: queryConditions,
				datatype: "json",
				autowidth: !0,
				height: 354,
				altRows: !0,
				gridview: !0,
				onselectrow: !1,
				multiselect: multiselect,
				colModel: b,
				pager: "#page",
				viewrecords: !0,
				cmTemplate: {
					sortable: !1
				},
				rowNum: 100,
				rowList: [100, 200, 500],
				shrinkToFit: !0,
				jsonReader: {
					root: "data.rows",
					records: "data.records",
					total: "data.total",
					repeatitems: !1,
					id: "id"
				},
				loadComplete: function(a) {},
				loadError: function(a, b, c) {}
			})
		},
		reloadData: function(a) {
			$("#grid").jqGrid("setGridParam", {
				page: 1,
				postData: a
			}).trigger("reloadGrid")
		},
		addEvent: function() {
			var a = this;
			$(".grid-wrap").on("click", ".ui-icon-search", function(a) {
				a.preventDefault();
				var b = $(this).parent().data("id");
				Business.forSearch(b, "")
			}), $("#search").click(function() {
				var b = "输入编号 / 名称 / 联系人 / 电话查询" === a.$_matchCon.val() ? "" : a.$_matchCon.val(),
					c = a.catorageCombo.getValue();
				a.reloadData({
					skey: b,
					categoryId: c
				})
			}), $("#refresh").click(function() {
				a.reloadData(queryConditions)
			})
		}
	};
THISPAGE.init();