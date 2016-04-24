var Router = function(options) {
    
  this.hashTimer; 
  this.slugs = {};
  this.slugRegExp = "[a-z0-9-]+";

  $.extend(this, options);
	
};

Router.prototype = {
  
  onHashChange: function() {
    
		var href = window.location.hash.replace("#!", ""),
        href = href.replace(/\/$/, ""),
        pieces = href.split("/");
    
    pieces.shift();

    for (var route in this.routes) {
      var regexp = route, action = this.routes[route];      
      
      regexp = regexp.replace("/", "\/");
      
      if (this.slugs[route]) {
        regexp = regexp.replace(this.slugs[route][0], this.slugRegExp);
      }
      
      regexp = "^" + regexp + "$";
      
      if(new RegExp(regexp, "i").test(href)) {
        if ($.isFunction(this.before)) this.before();

        var slugs = this.slugs[route] ? pieces.splice(-1, this.slugs[route].length) : null;
        
        action.apply(this, slugs || []);
        
        //stop after first match
        return; 
      }
    }
	},
	
	start: function() {
    for (var route in this.routes) {
      var action = this.routes[route];
      
      //remote old route
      delete(this.routes[route]);      
      
      //remove trailing slash
      route = route.replace(/\/$/, "");
      
      //find slugs
      var matches = route.match(/\:[a-z0-9-]+(\/|$)/ig);
      
      //save slugs
      if (matches) {
        for (var index in matches) {
          var slug = ("" + matches[index]).replace("/", "");
          if(!$.isArray(this.slugs[route])) this.slugs[route] = [];
          this.slugs[route].push(slug);
        }
      }
      
      //save new route
      this.routes[route] = action;
    }
    
    $(window).on({'hashchange': $.proxy(this.onHashChange, this)}).trigger("hashchange");
    
		if (("onhashchange" in window)) {
      var stash = window.location.hash;
      
      clearInterval(this.hashTimer);
      this.hashTimer = setInterval(function() { 
        if (stash != window.location.hash) {
          stash = window.location.hash;
          $(window).trigger("hashchange");
        }
      }, 500);
		}
	}
  
};