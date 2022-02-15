$(document).ready(function(){

    let arrGoods = document.getElementsByName("count");
    arrGoods.forEach(element => {
        $(element).change(function(e){
        e.preventDefault();
            $.ajax({
                type: "POST", 
                url: "/?controller=cart&action=updateCount",
                data: {
                    goodId: element.id,
                    count: element.value,
                    contentType: "application/json; charset=utf-8",
                },
                dataType: "json",
                success: function(data){
                    console.log(data);
                    $(`#output-total${element.id}`).html(data.total);
                    $(`#output-grandtotal`).html(data.gtotal);
                },
                failure: function() {
                }
            });
        });
    });
});