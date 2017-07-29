function logout() {
    $.post('././Login/logout', 'uid',function (data) {
        alert(data);
        $('#login_center').load('index.html #login_center');
        }
    )
}