$("#purchaseprice").on("change", function () {
    calLoan();
});

$("#due").on("change", function () {
    calLoan();
});

$("#quantity").on("change", function () {
    calLoan();
});
$("#discount").on("change", function () {
    calLoan();
});

function calLoan() {
    if ($("#purchaseprice").val() == "") {
        return false;
    } else if ($("#quantity").val() == "") {
        return false;
    } else if ($("#discount").val() == "") {
        return false;
    } else if ($("#due").val() == "") {
        return false;
    } else {
        var totalamount = 0;
        totalamount = Number(
            ($("#purchaseprice").val() *
                Number($("#quantity").val() * Number($("#discount").val()))) /
                100
        );
        totalpayment = totalamount / Number($("#duration").val());
        $("#repayment").val(totalamount.toFixed(2));
        $("#repaymentpm").val(totalpayment.toFixed(2));
    }
}

$("#sdate").on("change", function () {
    if ($("#duration").val() == "") {
        return false;
    }

    var a = Number($("#duration").val());
    var CurentDate = new Date($("#sdate").val());
    CurentDate.setMonth(CurentDate.getMonth() + a);
    $("#edate").val(CurentDate.toISOString().split("T")[0]);
});

$(".nice-select ul li").on("click", function () {
    let loanId = $(this).attr("data-value");
    // alert(loanId);
    $.ajax({
        type: "get",
        url: "ajax/loan/" + loanId,
        success: function (response) {
            // alert(response);
            data = JSON.parse(response);
            $("#interest").val(data["loan_percentage"]);
            // console.log(data);
            // alert(data['loan_percentage']);
        },
    });
});
