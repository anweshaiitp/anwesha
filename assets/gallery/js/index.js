(function() {
  $('.gallery-link').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    image: {
      verticalFit: true,
      titleSrc: function(item) {
        return item.el.find('figcaption').text() || item.el.attr('title');
      }
    },
    zoom: {
      enabled: true
    },
    // duration: 300
    gallery: {
      enabled: true,
      navigateByImgClick: false,
      tCounter: ''
    },
    disableOn: function() {
      if ($(window).width() < 640) {
        return false;
      }
      return true;
    }
  });

}).call(this);

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFBQSxDQUFBLENBQUUsZUFBRixDQUFrQixDQUFDLGFBQW5CLENBQ0U7SUFBQSxJQUFBLEVBQU0sT0FBTjtJQUNBLG1CQUFBLEVBQXFCLElBRHJCO0lBRUEsY0FBQSxFQUFnQixLQUZoQjtJQUdBLFNBQUEsRUFBVyw4QkFIWDtJQUlBLEtBQUEsRUFDRTtNQUFBLFdBQUEsRUFBYSxJQUFiO01BQ0EsUUFBQSxFQUFVLFFBQUEsQ0FBQyxJQUFELENBQUE7ZUFDUixJQUFJLENBQUMsRUFBRSxDQUFDLElBQVIsQ0FBYSxZQUFiLENBQTBCLENBQUMsSUFBM0IsQ0FBQSxDQUFBLElBQXFDLElBQUksQ0FBQyxFQUFFLENBQUMsSUFBUixDQUFhLE9BQWI7TUFEN0I7SUFEVixDQUxGO0lBUUEsSUFBQSxFQUNFO01BQUEsT0FBQSxFQUFTO0lBQVQsQ0FURjs7SUFXQSxPQUFBLEVBQ0U7TUFBQSxPQUFBLEVBQVMsSUFBVDtNQUNBLGtCQUFBLEVBQW9CLEtBRHBCO01BRUEsUUFBQSxFQUFVO0lBRlYsQ0FaRjtJQWVBLFNBQUEsRUFBVyxRQUFBLENBQUEsQ0FBQTtNQUNULElBQWdCLENBQUEsQ0FBRSxNQUFGLENBQVMsQ0FBQyxLQUFWLENBQUEsQ0FBQSxHQUFvQixHQUFwQztBQUFBLGVBQU8sTUFBUDs7QUFDQSxhQUFPO0lBRkU7RUFmWCxDQURGO0FBQUEiLCJzb3VyY2VzQ29udGVudCI6WyIkKCcuZ2FsbGVyeS1saW5rJykubWFnbmlmaWNQb3B1cFxuICB0eXBlOiAnaW1hZ2UnXG4gIGNsb3NlT25Db250ZW50Q2xpY2s6IHRydWVcbiAgY2xvc2VCdG5JbnNpZGU6IGZhbHNlXG4gIG1haW5DbGFzczogJ21mcC13aXRoLXpvb20gbWZwLWltZy1tb2JpbGUnXG4gIGltYWdlOiBcbiAgICB2ZXJ0aWNhbEZpdDogdHJ1ZVxuICAgIHRpdGxlU3JjOiAoaXRlbSkgLT5cbiAgICAgIGl0ZW0uZWwuZmluZCgnZmlnY2FwdGlvbicpLnRleHQoKSB8fCBpdGVtLmVsLmF0dHIoJ3RpdGxlJylcbiAgem9vbTpcbiAgICBlbmFibGVkOiB0cnVlXG4gICAgIyBkdXJhdGlvbjogMzAwXG4gIGdhbGxlcnk6XG4gICAgZW5hYmxlZDogdHJ1ZVxuICAgIG5hdmlnYXRlQnlJbWdDbGljazogZmFsc2VcbiAgICB0Q291bnRlcjogJydcbiAgZGlzYWJsZU9uOiAtPlxuICAgIHJldHVybiBmYWxzZSBpZiAkKHdpbmRvdykud2lkdGgoKSA8IDY0MFxuICAgIHJldHVybiB0cnVlXG4gIl19
//# sourceURL=coffeescript