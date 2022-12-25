$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })


    });
});

/// ConFirm
$(function(){
    $(document).on('click','#confirm',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure to confirm?',
            text: " Once Confirm ,You Will not be able toPending again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, ConFirm'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
              Swal.fire(
                'ConFirm!',
                'ConFirm Changes',
                'success'
              )
            }
          })


    });
});


/// Processig
$(function(){
    $(document).on('click','#processing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure to processing?',
            text: " Once processing ,You Will not be able toPending again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, processing'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
              Swal.fire(
                'processing!',
                'processing Changes',
                'success'
              )
            }
          })


    });
});


/// picked
$(function(){
    $(document).on('click','#picked',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure to picked?',
            text: " Once picked ,You Will not be able toPending again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, picked'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
              Swal.fire(
                'picked!',
                'picked Changes',
                'success'
              )
            }
          })


    });
});

/// shipped
$(function(){
    $(document).on('click','#shipped',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure to shipped?',
            text: " Once shipped ,You Will not be able toPending again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, shipped'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
              Swal.fire(
                'shipped!',
                'shipped Changes',
                'success'
              )
            }
          })


    });
});


/// delivered
$(function(){
    $(document).on('click','#delivered',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure to delivered?',
            text: " Once delivered ,You Will not be able toPending again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delivered'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
              Swal.fire(
                'delivered!',
                'delivered Changes',
                'success'
              )
            }
          })


    });
});



/// cancel
$(function(){
    $(document).on('click','#cancel',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure to cancel?',
            text: " Once cancel ,You Will not be able toPending again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, cancel'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
              Swal.fire(
                'cancel!',
                'cancel Changes',
                'success'
              )
            }
          })


    });
});

