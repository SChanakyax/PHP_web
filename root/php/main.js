$(".btnedit").click(e => {
    // console.log("icon Clicked!");
    let textvalues = displayData(e);

    let id = $("input[name*='book_id']");
    let bookname = $("input[name*='book_name']");
    let bookpublisher = $("input[name*='book_publisher']");
    let bookprice = $("input[name*='book_price']");

    id.val(textvalues[0]);
    bookname.val(textvalues[1]);
    bookpublisher.val(textvalues[2]);
    bookprice.val(textvalues[3].replace("$", ""));


    console.log(textvalues);
});

function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = []; //array to save jQuery data

    for (const value of td) {
        //   console.log(value)

        if (value.dataset.id == e.target.dataset.id) {
            //  console.log(e.target.dataset.id);
            //   console.log(value);

            textvalues[id++] = value.textContent;

        }
    }

    return textvalues;
}