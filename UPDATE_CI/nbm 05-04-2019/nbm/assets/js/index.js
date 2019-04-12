

$('#demo').pagination({
    dataSource: 'https://localhost/produksi/data_padi',
    pageSize: 5,
    autoHidePrevious: true,
    autoHideNext: true,
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})