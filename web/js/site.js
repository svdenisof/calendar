var site = {
    openDateForm: function(){

        var data = $(this).data('id');
        var uri = data.replace(/(\w+)-(\d+)-(\d)/, "\/$1\/$2\/$3", data);
        console.log(uri);
        window.location.href = uri;
    }
}