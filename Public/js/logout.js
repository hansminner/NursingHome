function logout() {
    $.post('../Login/logout', 'uid',function (data) {
        alert(data);
        $('#login_center').load('top_bar.html');
        }
    )
}