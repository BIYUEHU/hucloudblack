<<<<<<< HEAD
// const adrawer = new mdui.Drawer('#drawer', true);
// adrawer.open();

const getRequestPars = (url) => {
	const str = url.substr(url.indexOf("?") + 1);
	const arr = str.split("&");
	const result = {};
	for (let i = 0; i < arr.length; i++) {
		const item = arr[i].split("=");
		result[item[0]] = item[1];
	}
	return result;
};

function mduiAlert(title, content, callback) {
	mdui.dialog({
		title: title,
		content: content,
		buttons: [
			{
				text: "取消",
			},
			{
				text: "确定",
				onClick: (d) => callback(d),
			},
		],
	});
}

function mduiPrompt(title, content, callback) {
	mdui.prompt(content, title, (d) => callback(b), null, {
		confirmText: "确定",
		cancelText: "取消",
	});
}

function printError(back, data) {
	back.code == 500 || console.log(data);

	switch(back.code) {
		case 500:	
			mdui.snackbar("操作成功");
			setTimeout(() => {
				window.location.reload();
			}, 1000);
			break;
		case 501:
			mdui.snackbar("参数不能为空");
			break;
		case 502:
			mdui.snackbar("参数错误");
			break;
		case 507:
			mdui.snackbar("非法字符串");
			break;
		case 508:
			mdui.snackbar("数据库拒绝");
			break;
		case 509:
			mdui.snackbar("拒绝请求");
			break;
		case undefined:
			mdui.snackbar('SQL错误');
			break;
		default:
			mdui.snackbar(`错误:${back.message}`);
	}

	back.code == 500 || console.log(data);
	console.log(back);
}

function sendPostRequest(url, data = {}, callback) {
	if (callback == null) {
		callback = function (d) {
			printError(d, data);
		}
	}
	$.post(url, { ...data }, (d) => callback(d));
}

/* login */
function doLogin() {
	event.preventDefault();
	const name = $("#hcb_name").val();
	const password = $("#hcb_password").val();
	const verify = $("#hcb_verify").val();
	if (!(name && password && verify)) {
		mdui.snackbar("账号、密码或验证码不能为空");
		return;
	}

	const data = {
		name: name,
		password: password,
		verify: verify
	};
	sendPostRequest("/login", data, (d) => {
		switch(d.code) {
			case 500:	
				mdui.snackbar("登录成功");
				setTimeout(() => {
					location.href = "/manage/person";
				}, 1000);
				break;
			case 501:
				mdui.snackbar("账号或密码不能为空");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			case 502:
				mdui.snackbar("账号或密码错误");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			case 510:
				mdui.snackbar("验证码错误");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			default:
				printError(d, data);
		}
	})
}

/* register */
function doRegister() {
	event.preventDefault();
	const name = $("#hcb_name").val();
	const password = $("#hcb_password").val();
	const password2 = $("#hcb_password2").val();
	const email = $("#hcb_email").val();
	const phone = $("#hcb_phone").val();
	const qq = $("#hcb_qq").val();
	const verify = $("#hcb_verify").val();
	if (!(name && password && password2 && email && phone && qq && verify)) {
		mdui.snackbar("必填项不能为空");
		return;
	}

	if (password != password2) {
		mdui.snackbar("两次输入密码不一致");
		return;
	}

	const data = {
		name: name,
		password: password,
		email: email,
		phone: phone,
		qq: qq,
		verify: verify
	};
	sendPostRequest("/register", data, (d) => {
		switch(d.code) {
			case 500:	
				mdui.snackbar("注册成功,请注意邮件接收");
				setTimeout(() => {
					location.href = "";
				}, 3000);
				break;
			case 501:
				mdui.snackbar("账号或密码不能为空");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			case 502:
				mdui.snackbar("邮箱或手机号或QQ格式错误");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			case 508:
				mdui.snackbar("账号或邮箱已注册");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			case 510:
				mdui.snackbar("验证码错误");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			default:
				printError(d, data);
		}
	})
}

/* chat */
function chatSend(value, type = 'message') {
	if (!value) {
		mdui.snackbar("消息不能为空");	
		return;
	}

	const data = {value: value, type: type};
	sendPostRequest("/chat", data, (d) => {
		switch (d.code) {
			case 500:
				mdui.snackbar("发送成功");
				window.location.reload();
				break;
			case 501:
				mdui.snackbar("消息不能为空");
				break;		
			default:
				printError(d, data);
		}
	});
}

function chatSendMessage() {
	const value = $("#hcb_message").val();
	chatSend(value);
}

function chatSendImages() {
	const value = $("#hcb_images").val();
	chatSend(value, 'images');
}

/* account */
function accountReport() {
	_REQUEST = getRequestPars(decodeURI(location.href));
	reportInfo = $("#hcb_report");
}

/* release */
function recordRelease() {
	event.preventDefault();
	const plate = $("#hcb_plate").val(),
		idkey = $("#hcb_idkey").val(),
		descr = $("#hcb_descr").val(),
		level = Number($("#hcb_level").val());

	if (!(plate && idkey && descr && level)) {
		mdui.snackbar("必填项不能为空");
		return;
	}
	const data = {plate: plate, idkey: idkey, descr: descr, level: level, phone: $("#hcb_phone").val(), imgs: $("#hcb_imgs").val() };

	sendPostRequest("/manage/release", data, (d) => {
		switch (d.code) {
			case 500:
				mdui.snackbar("发布成功,待审核");
				setTimeout(() => {
					window.location.reload();
				}, 1000);
				break;
			case 501:
				mdui.snackbar("必填项不能为空");
				break;
			case 508:
				mdui.snackbar("记录已存在");
				break;
			default:
				printError(d, data);
		}
	});
}

/* examine */
function examine(id, value = 'reject', isadmin = false) {
	isadmin = isadmin ? '/manage/s/recordlist' : '/manage/examine';
	switch (value) {
		case 'delete':
			content = '确定要删除吗?';
			isadmin = '/manage/s/recordlist';
			break;
		case 'pass':
			content = '确定要通过吗?';
			break;
		default:
			value = 'reject';
			content = '确定要拒绝吗?';
	}

    mduiAlert('提示', content, () => {
        sendPostRequest(isadmin, {id: id, value: value});
	});
}
function examinePass(id) {
	examine(id, 'pass');
}
function examineReject(id) {
	examine(id);
}


/* webset */
function webset() {
	event.preventDefault();
	const data = {};
	$("[id=hcb_sets]").each(function () {
		data[$(this).attr('setval')] = $(this).val();
	})
	sendPostRequest("/manage/s/webset", data);
}

/* recordlist */
function recordUpdate(id) {
    id = $(id).parent().parent().find('td').eq(0).text();
    location.href = `/manage/s/recordedit?id=${id}`;
}

function recordPass(id) {
	id = $(id).parent().parent().find('td').eq(0).text();
	examine(id, 'pass', true);
}
function recordReject(id) {
	id = $(id).parent().parent().find('td').eq(0).text();
	examine(id, 'reject', true);
}
function recordDelete(id) {
	id = $(id).parent().parent().find('td').eq(0).text();
	examine(id, 'delete', true);
}

/* recordedit */
function recordEdit() {
    event.preventDefault();

	const plate = $('#hcb_plate').val(),
		idkey = $('#hcb_idkey').val(),
		descr = $('#hcb_descr').val(),
		level = Number($('#hcb_level').val());
    if (!(plate && idkey && descr && level)) {
        mdui.snackbar('必填项不能为空');
        return;
    }

    sendPostRequest('/manage/s/recordedit', { id: getRequestPars(decodeURI(location.href))['id'], plate: plate, idkey: idkey, descr: descr, level: level, phone: $('#hcb_phone').val(), imgs: $('#hcb_imgs').val()
	})
}

/* userlist */
function userUpdate(id) {
	id = $(id).parent().parent().find("td").eq(0).text();
	location.href = `/manage/s/useredit?id=${id}`;
}

function userDelete(id) {
	mduiAlert("提示", "确定要删除吗?", () => {
		id = $(id).parent().parent().find("td").eq(0).text();
		sendPostRequest("/manage/s/userlist", { id: id, value: 'delete' });
	})
}

function userAdd() {
	const name = $("#hcb_name").val(),
		password = $("#hcb_password").val(),
		email = $("#hcb_email").val(),
		phone = $("#hcb_phone").val(),
		qq = $("#hcb_qq").val(),
		ip = $("#hcb_ip").val(),
		opgroup = $("#hcb_opgroup").val();
		
	if (!(name && password && email && phone && qq && ip && opgroup)) {
		mdui.snackbar('必填项不能为空');
		return;
	}
	sendPostRequest("/manage/s/userlist", {	value: "add",name: name, password: password, email: email, phone: phone, qq: qq, ip: ip, opgroup: opgroup });
}

/* useredit */
function userEdit() {
	event.preventDefault();
	const name = $("#hcb_name").val();
		email = $("#hcb_email").val();
		phone = $("#hcb_phone").val();
		qq = $("#hcb_qq").val();
		opgroup = $("#hcb_opgroup").val();
	if (!(name && email && phone && qq && opgroup)) {
		mdui.snackbar('必填项不能为空');
		return;
	}

	sendPostRequest("/manage/s/useredit", {	id: getRequestPars(decodeURI(location.href))["id"], name: name, email: email, phone: phone, qq: qq, opgroup: opgroup });
}
=======
// const adrawer = new mdui.Drawer('#drawer', true);
// adrawer.open();

const getRequestPars = (url) => {
	const str = url.substr(url.indexOf("?") + 1);
	const arr = str.split("&");
	const result = {};
	for (let i = 0; i < arr.length; i++) {
		const item = arr[i].split("=");
		result[item[0]] = item[1];
	}
	return result;
};

function mduiAlert(title, content, callback) {
	mdui.dialog({
		title: title,
		content: content,
		buttons: [
			{
				text: "取消",
			},
			{
				text: "确定",
				onClick: (d) => callback(d),
			},
		],
	});
}

function mduiPrompt(title, content, callback) {
	mdui.prompt(content, title, (d) => callback(b), null, {
		confirmText: "确定",
		cancelText: "取消",
	});
}

function printError(back, data) {
	back.code == 500 || console.log(data);

	switch(back.code) {
		case 500:	
			mdui.snackbar("操作成功");
			setTimeout(() => {
				window.location.reload();
			}, 1000);
			break;
		case 501:
			mdui.snackbar("参数不能为空");
			break;
		case 502:
			mdui.snackbar("参数错误");
			break;
		case 507:
			mdui.snackbar("非法字符串");
			break;
		case 508:
			mdui.snackbar("数据库拒绝");
			break;
		case 509:
			mdui.snackbar("拒绝请求");
			break;
		case undefined:
			mdui.snackbar('SQL错误');
			break;
		default:
			mdui.snackbar(`错误:${back.message}`);
	}

	back.code == 500 || console.log(data);
	console.log(back);
}

function sendPostRequest(url, data = {}, callback) {
	if (callback == null) {
		callback = function (d) {
			printError(d, data);
		}
	}
	$.post(url, { ...data }, (d) => callback(d));
}

/* login */
function doLogin() {
	event.preventDefault();
	const name = $("#hcb_name").val();
	const password = $("#hcb_password").val();
	const verify = $("#hcb_verify").val();
	if (!(name && password && verify)) {
		mdui.snackbar("账号、密码或验证码不能为空");
		return;
	}

	const data = {
		name: name,
		password: password,
		verify: verify
	};
	sendPostRequest("/login", data, (d) => {
		switch(d.code) {
			case 500:	
				mdui.snackbar("登录成功");
				setTimeout(() => {
					location.href = "/manage/person";
				}, 1000);
				break;
			case 501:
				mdui.snackbar("账号或密码不能为空");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			case 502:
				mdui.snackbar("账号或密码错误");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			case 510:
				mdui.snackbar("验证码错误");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			default:
				printError(d, data);
		}
	})
}

/* register */
function doRegister() {
	event.preventDefault();
	const name = $("#hcb_name").val();
	const password = $("#hcb_password").val();
	const password2 = $("#hcb_password2").val();
	const email = $("#hcb_email").val();
	const phone = $("#hcb_phone").val();
	const qq = $("#hcb_qq").val();
	const verify = $("#hcb_verify").val();
	if (!(name && password && password2 && email && phone && qq && verify)) {
		mdui.snackbar("必填项不能为空");
		return;
	}

	if (password != password2) {
		mdui.snackbar("两次输入密码不一致");
		return;
	}

	const data = {
		name: name,
		password: password,
		email: email,
		phone: phone,
		qq: qq,
		verify: verify
	};
	sendPostRequest("/register", data, (d) => {
		switch(d.code) {
			case 500:	
				mdui.snackbar("注册成功,请注意邮件接收");
				setTimeout(() => {
					location.href = "";
				}, 3000);
				break;
			case 501:
				mdui.snackbar("账号或密码不能为空");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			case 502:
				mdui.snackbar("邮箱或手机号或QQ格式错误");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			case 508:
				mdui.snackbar("账号或邮箱已注册");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			case 510:
				mdui.snackbar("验证码错误");
				$('#captchaimgImg').attr('src', '/captchaimg');
				break;
			default:
				printError(d, data);
		}
	})
}

/* chat */
function chatSend(value, type = 'message') {
	if (!value) {
		mdui.snackbar("消息不能为空");	
		return;
	}

	const data = {value: value, type: type};
	sendPostRequest("/chat", data, (d) => {
		switch (d.code) {
			case 500:
				mdui.snackbar("发送成功");
				window.location.reload();
				break;
			case 501:
				mdui.snackbar("消息不能为空");
				break;		
			default:
				printError(d, data);
		}
	});
}

function chatSendMessage() {
	const value = $("#hcb_message").val();
	chatSend(value);
}

function chatSendImages() {
	const value = $("#hcb_images").val();
	chatSend(value, 'images');
}

/* account */
function accountReport() {
	_REQUEST = getRequestPars(decodeURI(location.href));
	reportInfo = $("#hcb_report");
}

/* release */
function recordRelease() {
	event.preventDefault();
	const plate = $("#hcb_plate").val(),
		idkey = $("#hcb_idkey").val(),
		descr = $("#hcb_descr").val(),
		level = Number($("#hcb_level").val());

	if (!(plate && idkey && descr && level)) {
		mdui.snackbar("必填项不能为空");
		return;
	}
	const data = {plate: plate, idkey: idkey, descr: descr, level: level, phone: $("#hcb_phone").val(), imgs: $("#hcb_imgs").val() };

	sendPostRequest("/manage/release", data, (d) => {
		switch (d.code) {
			case 500:
				mdui.snackbar("发布成功,待审核");
				setTimeout(() => {
					window.location.reload();
				}, 1000);
				break;
			case 501:
				mdui.snackbar("必填项不能为空");
				break;
			case 508:
				mdui.snackbar("记录已存在");
				break;
			default:
				printError(d, data);
		}
	});
}

/* examine */
function examine(id, value = 'reject', isadmin = false) {
	isadmin = isadmin ? '/manage/s/recordlist' : '/manage/examine';
	switch (value) {
		case 'delete':
			content = '确定要删除吗?';
			isadmin = '/manage/s/recordlist';
			break;
		case 'pass':
			content = '确定要通过吗?';
			break;
		default:
			value = 'reject';
			content = '确定要拒绝吗?';
	}

    mduiAlert('提示', content, () => {
        sendPostRequest(isadmin, {id: id, value: value});
	});
}
function examinePass(id) {
	examine(id, 'pass');
}
function examineReject(id) {
	examine(id);
}


/* webset */
function webset() {
	event.preventDefault();
	const data = {};
	$("[id=hcb_sets]").each(function () {
		data[$(this).attr('setval')] = $(this).val();
	})
	sendPostRequest("/manage/s/webset", data);
}

/* recordlist */
function recordUpdate(id) {
    id = $(id).parent().parent().find('td').eq(0).text();
    location.href = `/manage/s/recordedit?id=${id}`;
}

function recordPass(id) {
	id = $(id).parent().parent().find('td').eq(0).text();
	examine(id, 'pass', true);
}
function recordReject(id) {
	id = $(id).parent().parent().find('td').eq(0).text();
	examine(id, 'reject', true);
}
function recordDelete(id) {
	id = $(id).parent().parent().find('td').eq(0).text();
	examine(id, 'delete', true);
}

/* recordedit */
function recordEdit() {
    event.preventDefault();

	const plate = $('#hcb_plate').val(),
		idkey = $('#hcb_idkey').val(),
		descr = $('#hcb_descr').val(),
		level = Number($('#hcb_level').val());
    if (!(plate && idkey && descr && level)) {
        mdui.snackbar('必填项不能为空');
        return;
    }

    sendPostRequest('/manage/s/recordedit', { id: getRequestPars(decodeURI(location.href))['id'], plate: plate, idkey: idkey, descr: descr, level: level, phone: $('#hcb_phone').val(), imgs: $('#hcb_imgs').val()
	})
}

/* userlist */
function userUpdate(id) {
	id = $(id).parent().parent().find("td").eq(0).text();
	location.href = `/manage/s/useredit?id=${id}`;
}

function userDelete(id) {
	mduiAlert("提示", "确定要删除吗?", () => {
		id = $(id).parent().parent().find("td").eq(0).text();
		sendPostRequest("/manage/s/userlist", { id: id, value: 'delete' });
	})
}

function userAdd() {
	const name = $("#hcb_name").val(),
		password = $("#hcb_password").val(),
		email = $("#hcb_email").val(),
		phone = $("#hcb_phone").val(),
		qq = $("#hcb_qq").val(),
		ip = $("#hcb_ip").val(),
		opgroup = $("#hcb_opgroup").val();
		
	if (!(name && password && email && phone && qq && ip && opgroup)) {
		mdui.snackbar('必填项不能为空');
		return;
	}
	sendPostRequest("/manage/s/userlist", {	value: "add",name: name, password: password, email: email, phone: phone, qq: qq, ip: ip, opgroup: opgroup });
}

/* useredit */
function userEdit() {
	event.preventDefault();
	const name = $("#hcb_name").val();
		email = $("#hcb_email").val();
		phone = $("#hcb_phone").val();
		qq = $("#hcb_qq").val();
		opgroup = $("#hcb_opgroup").val();
	if (!(name && email && phone && qq && opgroup)) {
		mdui.snackbar('必填项不能为空');
		return;
	}

	sendPostRequest("/manage/s/useredit", {	id: getRequestPars(decodeURI(location.href))["id"], name: name, email: email, phone: phone, qq: qq, opgroup: opgroup });
}
>>>>>>> 9ee86424b546e053f207426a6a99f8bf7275517a
