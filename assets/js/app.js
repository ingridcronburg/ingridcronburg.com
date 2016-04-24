var $body = $("html"),
    $main = $(".main"),
    $index = $(".index", $main),
    $gallery = $(".gallery", $main),
    $collage = $(".collage", $main),
    $collageList = $(".collage-list", $main),
    $sections = $index.add($gallery).add($collage).add($collageList);

var router = new Router({
    before: function() {
      $body.removeClass('background');
      $sections.hide();
    },
    routes: {
      '/': function() {
        $body.addClass('background');
        $index.show();
      },

      '/gallery/:name': function(name) {
        Gallery.load(name);
        $gallery.show();
      },

      '/collage': function() {
        $collageList.show();
      },

      '/collage/:name': function(name) {
        new Collage(name, $collage).show();
      }
    }
});

router.start();
