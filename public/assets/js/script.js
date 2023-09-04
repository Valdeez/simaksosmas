$('.owl-carousel').owlCarousel({
    center: true,
    loop:true,
    margin:20,
    nav:true,
    navText: [
        '<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>'
    ],
    responsive:{
        0:{
            items:1,
            nav: false
        },
        600:{
            items:1,
            nav: false
        },
        1000:{
            items:3
        }
    }
});

$("li.dropdown").click( function () {
    var currentlist = $(this);
    var siblinglist = (currentlist.siblings(".dropdown"));
    siblinglist.removeClass('showMenu');
    currentlist.toggleClass('showMenu');
});

$(document).click(function(event){
  if (!$(event.target).closest('li.dropdown').length)
  {
    console.log(event.target)
    $("li.dropdown").removeClass('showMenu');
  }
});

$(function() {
  $('input').focus(function() {
    var inputId = $(this).attr("id")
    $('label#' + inputId).css('color', '#ffa500');
  }),
  $('input').focusout(function() {
    var inputId = $(this).attr("id")
    $('label#' + inputId).css('color', '');
  });
});

// $('#datatable').DataTable()

const faq = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const faqToggle = this.getAttribute('aria-expanded');
  console.log(faqToggle)
  
  for (i = 0; i < faq.length; i++) {
    faq[i].setAttribute('aria-expanded', 'false');
    console.log(faq);
  }
  
  if (faqToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

faq.forEach(item => item.addEventListener('click', toggleAccordion));

window.fileEdit = function (){
  var a = document.getElementById('fileInputEdit');
  var fileLabel = document.getElementById('fileLabelEdit');
  if(a.value == "")
  {
    fileLabel.innerHTML = "No file chosen";
  }
  else
  {
    var theSplit = a.value.split('\\');
    fileLabel.innerHTML = theSplit[theSplit.length-1];
  }
};

window.fileUpload = function (){
  var a = document.getElementById('fileInputUpload');
  var fileLabel = document.getElementById('fileLabelUpload');
  if(a.value == "")
  {
    fileLabel.innerHTML = "No file chosen";
  }
  else
  {
    var theSplit = a.value.split('\\');
    fileLabel.innerHTML = theSplit[theSplit.length-1];
  }
};

$('#searchModul').on('keyup', function(e){
  e.preventDefault();
  let keyword = $('#searchModul').val();
  $.ajax({
    url:"/modul/search",
    method:"GET",
    data:{keyword:keyword},
    success:function(res){
      $('.list-wrapper').html(res);
    }
  })
});

$('#searchLaporan').on('keyup', function(e){
  e.preventDefault();
  let keyword = $('#searchLaporan').val();
  $.ajax({
    url:"/laporan/search",
    method:"GET",
    data:{keyword:keyword},
    success:function(res){
      $('.list-wrapper').html(res);
    }
  })
});

$('#searchWarta').on('keyup', function(e){
  e.preventDefault();
  let keyword = $('#searchWarta').val();
  $.ajax({
    url:"/warta/search",
    method:"GET",
    data:{keyword:keyword},
    success:function(res){
      $('#news-list').html(res);
    }
  })
});

$('#searchKajian').on('keyup', function(e){
  var url = $(location).attr('href')
  var parts = url.split("/")
  var last_part = parts[parts.length-1];
  e.preventDefault();
  let keyword = $('#searchKajian').val();
  $.ajax({
    url:"/kajian/"+last_part+"/search",
    method:"GET",
    data:{keyword:keyword},
    success:function(res){
      $('.list-wrapper').html(res);
    }
  })
});

$('#select').on('change', function(){
  let selectTahun = $('#selectTahun').val()
  let selectBulan = $('#selectBulan').val()
  if(selectTahun && selectBulan != null){
    $.ajax({
      url:"/petadata/"+selectTahun+"/"+selectBulan+"",
      method:"GET",
      success:function(){
        window.location.href = "/petadata/"+selectTahun+"/"+selectBulan+"";
      }
    })
  }
});

// $('#searchData').on('keyup', function(e){
//   var url = $(location).attr('href')
//   var parts = url.split("/")
//   var second_part = parts[parts.length-2];
//   var last_part = parts[parts.length-1];
//   e.preventDefault();
//   let keyword = $('#searchData').val();
//   $.ajax({
//     url:"/petadata/"+second_part+"/"+last_part+"/search",
//     method:"GET",
//     data:{keyword:keyword},
//     success:function(res){
//       $('#output').html(res);
//     }
//   })
// });

$('#searchData').on('keyup', function(e){
  if(e.keyCode === 13){
    $('#searchForm').submit();
  }
  return true
});