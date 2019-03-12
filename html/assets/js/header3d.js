// var parallax = {
//   options: {
//     multiplier: 0.002,
//     wrapper: "#parallax-wrap",
//     wrapperOffset: $("#parallax").offset(),
//     wrapperWidth: $("#parallax").width(),
//     wrapperHeight: $("#parallax").height(),
//     wrapperCenter: {
//       x: function() {
//         return parallax.options.wrapperOffset.left + parallax.options.wrapperWidth/2;
//       },
//       y: function() {
//             return parallax.options.wrapperOffset.top + parallax.options.wrapperHeight/2;
//       }
//     },
//     relativeMouse: {
//       x: function(x) {
//         return (x - parallax.options.wrapperCenter.x()) * parallax.options.multiplier;
//       },
//       y: function() {
//         return (parallax.mouseY - parallax.options.wrapperCenter.y()) * parallax.options.multiplier;
//       }
//     },
//     origin: {
//       x: function() {
//         return ((parallax.mouseX) / $(window).width()) * 100;
//       },
//       y: function() {
//         return ((parallax.mouseY) / $(window).height()) * 100;
//       }
//     }
//   },
//   mouseX: 0,
//   mouseY: 0,
//   mouse: function(x, y) {
//     var that = this;
//     this.mouseX = x;
//     this.mouseY = y;
//     $(parallax.options.wrapper).css({
//       "-webkit-transform": "perspective(1000px) rotateY("+ that.options.relativeMouse.x(that.mouseX) +"deg) rotateX("+ that.options.relativeMouse.y(that.mouseY) +"deg)",
//       "transform": "perspective(1000px) rotateY("+ that.options.relativeMouse.x(that.mouseX) +"deg) rotateX("+ that.options.relativeMouse.y(that.mouseY) +"deg)"
//     });
//   },
//   mousemoveEvent: function() {
//     var that = this;
//     $("body").mousemove(function(e) {
//         that.mouse(e.pageX, e.pageY);
//     });
//   },
//   init: function() {
//     this.mousemoveEvent();
//   }
// }

// $(document).ready(function() {
//   parallax.init();
// });