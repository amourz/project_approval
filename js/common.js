
var app = {
	 
	'ajax': {
		'post': function(url, data, obj, loading) {
			var loading = loading == 0 ? false : true;
			if (loading) {
				
			}

			mui.ajax({
				type: 'POST',
				url: url,
				data: data,
				dataType: 'json',
				timeout: 60 * 1000,
				success: obj,
				complete: function() {
					 
				},
				error: function(e, type) {
					mui.toast("数据加载失败，请返回重试!");
					if (document.querySelector('#pageLoading')) {
						document.querySelector('#pageLoading').innerHTML = "<h5 onclick='window.location.reload();'><i class='mui-icon mui-icon-refresh'></i>请重试</h5>";
					}
				}
			})
		},
		'get': function(url, data, obj, loading) {
			var loading = loading == 1 ? true : false;
			if (loading) {
				
			}

			mui.ajax({
				type: 'get',
				url: url,
				data: data,
				dataType: 'json',
				timeout: 60 * 1000,
				success: obj,
				complete: function() {
					
				},
				error: function(e, type) {
					app.debug(e);
					mui.toast("数据加载失败，请返回重试!");
					if (document.querySelector('#pageLoading')) {
						document.querySelector('#pageLoading').innerHTML = "<h5 onclick='window.location.reload();'><i class='mui-icon mui-icon-refresh'></i>请重试</h5>";
					}
				}
			});
		}
	},


	'pageLoading': function(obj) {

		setTimeout(function() {
			if (document.querySelector(obj).innerHTML.length < 5) {
				document.querySelector(obj).innerHTML = '<p style="text-align:center;padding:5px;" id="pageLoading" ><img src="../img/loading.gif" /></p>';
			}
		}, 100);
	}

}