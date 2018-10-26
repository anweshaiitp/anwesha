$('.gallery-link').magnificPopup
  type: 'image'
  closeOnContentClick: true
  closeBtnInside: false
  mainClass: 'mfp-with-zoom mfp-img-mobile'
  image: 
    verticalFit: true
    titleSrc: (item) ->
      item.el.find('figcaption').text() || item.el.attr('title')
  zoom:
    enabled: true
    # duration: 300
  gallery:
    enabled: true
    navigateByImgClick: false
    tCounter: ''
  disableOn: ->
    return false if $(window).width() < 640
    return true
 