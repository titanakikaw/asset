$(document).ready(() => {
    let dataTables_lengths = $('.dataTables_length')
    let dataTables_infos = $('.dataTables_info')
    let dataTables_paginates  = $('.dataTables_paginate a')
    dataTables_paginates.map((index, element) => {
        dataTables_paginates[index].style.fontSize = "10px"
    })
    //  console.log($('.dataTables_length'))
    dataTables_lengths.map((index,element) => {
        element.style.display = "none"
        dataTables_infos[index].style.fontSize = "10px"
        
        // dataTables_infos[index].style.textTransform = "Uppercase"
    });
})

