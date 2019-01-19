
class login {
	getToken() {
		$.ajax({
			type: "GET",
			url: "/api/get_csrf",
			success: function (r) {
				$("#_token").val(r["token"]);
			}
		});
	}
	listen() {
		$("#form")[0].addEventListener("submit", function () {
			$.ajax({
				type: "POST",
				url: "/api/admin/login",
				data: {
					email: $("#email").val(),
					password: $("#password").val(),
					_token: $("#_token").val()
				},
				success: function (r) {
					if (r["status"] === "login_ok") {
						localStorage.setItem("token_session", r["token_session"]);
					}
					alert(r["message"]);
				}
			})
		});
	}
}