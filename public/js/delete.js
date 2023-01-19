(function(doc){
    "use strict";

    const formDelete = doc.querySelector("#deleteForm");
    const btnDeletes = doc.querySelectorAll('.btn-delete');

    btnDeletes.forEach(item => {
        item.addEventListener('click',function(e){
            formDelete.action = item.dataset.url;
        });
    });

})(document);
