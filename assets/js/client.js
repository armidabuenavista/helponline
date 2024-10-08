$(document).ready(function() {
  // Avoid `console` errors in browsers that lack a console.
  (function() {
    var method;
    var noop = function() {};
    var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeStamp', 'trace', 'warn'];
    var length = methods.length;
    var console = (window.console = window.console || {});
    while (length--) {
      method = methods[length];
      // Only stub undefined methods.
      if (!console[method]) {
        console[method] = noop;
      } 
    }
  }());
  // Place any jQuery/helper plugins in here.
  /**
   * Single Page Nav Plugin
   * Copyright (c) 2013 Chris Wojcik <hello@chriswojcik.net>
   * Dual licensed under MIT and GPL.
   * @author Chris Wojcik
   * @version 1.1.0
   */
  // Utility
  if (typeof Object.create !== 'function') {
    Object.create = function(obj) {
      function F() {}
      F.prototype = obj;
      return new F();
    };
  }
  (function($, window, document, undefined) {
    "use strict";
    var SinglePageNav = {
      init: function(options, container) {
        this.options = $.extend({}, $.fn.singlePageNav.defaults, options);
        this.container = container;
        this.$container = $(container);
        this.$links = this.$container.find('a');
        if (this.options.filter !== '') {
          this.$links = this.$links.filter(this.options.filter);
        }
        this.$window = $(window);
        this.$htmlbody = $('html, body');
        this.$links.on('click.singlePageNav', $.proxy(this.handleClick, this));
        this.didScroll = false;
        this.checkPosition();
        this.setTimer();
      },
      handleClick: function(e) {
        var self = this,
          link = e.currentTarget,
          $elem = $(link.hash);
        e.preventDefault();
        if ($elem.length) { // Make sure the target elem exists
          // Prevent active link from cycling during the scroll
          self.clearTimer();
          // Before scrolling starts
          if (typeof self.options.beforeStart === 'function') {
            self.options.beforeStart();
          }
          self.setActiveLink(link.hash);
          self.scrollTo($elem, function() {
            if (self.options.updateHash) {
              document.location.hash = link.hash;
            }
            self.setTimer();
            // After scrolling ends
            if (typeof self.options.onComplete === 'function') {
              self.options.onComplete();
            }
          });
        }
      },
      scrollTo: function($elem, callback) {
        var self = this;
        var target = self.getCoords($elem).top;
        var called = false;
        self.$htmlbody.stop().animate({
          scrollTop: target
        }, {
          duration: self.options.speed,
          easing: self.options.easing,
          complete: function() {
            if (typeof callback === 'function' && !called) {
              callback();
            }
            called = true;
          }
        });
      },
      setTimer: function() {
        var self = this;
        self.$window.on('scroll.singlePageNav', function() {
          self.didScroll = true;
        });
        self.timer = setInterval(function() {
          if (self.didScroll) {
            self.didScroll = false;
            self.checkPosition();
          }
        }, 250);
      },
      clearTimer: function() {
        clearInterval(this.timer);
        this.$window.off('scroll.singlePageNav');
        this.didScroll = false;
      },
      // Check the scroll position and set the active section
      checkPosition: function() {
        var scrollPos = this.$window.scrollTop();
        var currentSection = this.getCurrentSection(scrollPos);
        this.setActiveLink(currentSection);
      },
      getCoords: function($elem) {
        return {
          top: Math.round($elem.offset().top) - this.options.offset
        };
      },
      setActiveLink: function(href) {
        var $activeLink = this.$container.find("a[href='" + href + "']");
        if (!$activeLink.hasClass(this.options.currentClass)) {
          this.$links.removeClass(this.options.currentClass);
          $activeLink.addClass(this.options.currentClass);
        }
      },
      getCurrentSection: function(scrollPos) {
        var i, hash, coords, section;
        for (i = 0; i < this.$links.length; i++) {
          hash = this.$links[i].hash;
          if ($(hash).length) {
            coords = this.getCoords($(hash));
            if (scrollPos >= coords.top - this.options.threshold) {
              section = hash;
            }
          }
        }
        // The current section or the first link
        return section || this.$links[0].hash;
      }
    };
    $.fn.singlePageNav = function(options) {
      return this.each(function() {
        var singlePageNav = Object.create(SinglePageNav);
        singlePageNav.init(options, this);
      });
    };
    $.fn.singlePageNav.defaults = {
      offset: 0,
      threshold: 120,
      speed: 400,
      currentClass: 'current',
      easing: 'swing',
      updateHash: false,
      filter: '',
      onComplete: false,
      beforeStart: false
    };
  })(jQuery, window, document);
  (function($) {
    "use strict";
    $('.navigation').singlePageNav({
      currentClass: 'active'
    });
    $('.toggle-menu').click(function() {
      $('.responsive-menu').stop(true, true).slideToggle();
      return false;
    });
  })(jQuery);
  /* $( "#newdate" ).datepicker({
dateFormat: 'yy-mm-dd',

   //disable past dates
      // minDate: '0',
     //  maxDate: '+2M',
        firstDay: 0

}); */


$(document).on("click", '#birthday', function() {
  var d = new Date();
  var year = d.getFullYear() - 20;
  d.setFullYear(year);
  $("#birthday").datepicker({
    changeYear: true,
    changeMonth: true,
    dateFormat: 'yy-mm-dd',
    yearRange: '1970:' + year + '',
    defaultDate: d
  });
});
/*  $(document).on("click", '#edit_info', function(e) {
    var valid_email = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var dateformat = /^\d{4}-\d{1,2}-\d{1,2}$/;
    var name = /^[a-zA-Z]+$/;
    var lname = $("#lname").val();
    var fname = $("#fname").val();
    var mname = $("#mname").val();
    var extn = $("#extn").val();
    var gender = $("#gender").val();
    var birthday = $("#birthday").val();
    var address = $("#address").val();
    var contact_no = $("#contact_no").val();
    var email_address = $("#email_address").val();
    var uid = $("#uid").val();
    
    if (lname == '' || lname.length <= 1) {
      $("#alert").html("Please enter last name. Last name must contain more than one character. Last name must not contain special characters and numbers.");
      $("#alert").addClass("alert alert-danger");
      $("#lname").addClass("error");
      $("#alert").focus();
      return false;
    } else if (fname == '' || fname.length <= 1) {
      $("#alert").html("Please enter first name. First name must contain more than one character. First name must not contain special characters and numbers.");
      $("#alert").addClass("alert alert-danger");
      $("#fname").addClass("error");
      $("#alert").focus();
      return false;
    } else if (mname == '' || mname.length <= 1) {
      $("#alert").html("Please enter middle name. Middle name must contain more than one character. Middle name must not contain special characters and numbers.");
      $("#alert").addClass("alert alert-danger");
      $("#mname").addClass("error");
      $("#alert").focus();
      return false;
    } else if (birthday == '' || !dateformat.test(birthday)) {
      $("#alert").html("Please enter date of birth in this format YYYY-MM-DD.");
      $("#alert").addClass("alert alert-danger");
      $("#birthday").addClass("error");
      $("#alert").focus();
      return false;
    } else if (address == '') {
      $("#alert").html("Please enter address.");
      $("#alert").addClass("alert alert-danger");
      $("#address").addClass("error");
      $("#alert").focus();
      return false;
    } else if (email_address == '' || !valid_email.test(email_address)) {
      $("#alert").html("Please enter a valid email address.");
      $("#alert").addClass("alert alert-danger");
      $("#email_address").addClass("error");
      $("#alert").focus();
      return false;
    }  else {
      
      $.ajax({
        type: "POST",
        url:  base_url+'help/update_info',
        data: "lname=" + lname + "&fname=" + fname + "&mname=" + mname + "&extn=" + extn + "&gender=" + gender + "&birthday=" + birthday + "&address=" + address + "&contact_no=" + contact_no + "&email_address=" + email_address+"&uid="+uid,
        success: function(html) {
         
          if (html == 'success') {
            $("#alert").html("Your info successfully updated.");
          
            $("#alert").addClass("alert alert-success");
            setTimeout("location.reload(true);",3000);
            $("#alert").focus();
            e.preventDefault();
        
          } else {
            $("#alert").html("Error: Something is wrong when saving the data.");
            $("#alert").addClass("alert alert-danger");
          }
        },
        beforeSend: function() {
          $("#alert").html("Loading...");
          $("#alert").addClass("alert alert-success");
        }
      });
    }
    return false;
  }); 
  
  $(document).on("click", '#edit_acct', function() {
    var username      = $("#username").val();
    var old_password  = $("#old_password").val();
    var new_password  = $("#new_password").val();
    var cnf_password  = $("#cnf_password").val();
    var uid = $("#uid").val();

    $.ajax({
        type: "POST",
        url:  base_url+'help/update_acct',
        data: "username="+ username +"&old_password=" + old_password + "&new_password=" + new_password+ "&cnf_password=" + cnf_password +"&uid="+uid,
        success: function(html) {
         
         if (html == 'success') {
            $("#alert1").html("Account successfully updated.");
          
            $("#alert1").addClass("alert alert-success");
            setTimeout("location.reload(true);",3000);
            $("#alert1").focus();
        
          } else  if (html == 'error') {
             $("#alert1").html("Password not match.");
          
            $("#alert1").addClass("alert alert-danger");
           
            $("#alert1").focus();

          }else  if (html == 'error1') {
            $("#alert1").html("Account not found in the database.");
          
            $("#alert1").addClass("alert alert-danger");
          
            $("#alert1").focus();

          }else {
            $("#alert1").html("Error: Something is wrong when saving the data.");
            $("#alert1").addClass("alert alert-danger");
          }
        },
        beforeSend: function() {
          $("#alert1").html("Loading...");
          $("#alert1").addClass("alert alert-success");
        }
      });

    return false;




  }); */


  
     $(document).on("click", "#save_stat", function() {
  
        var wt = $("#wt").val();
        var wt_opt = $("#wt_opt").val();
        var ht = $("#ht").val();
        var ht_ft = $("#ht_ft").val();
        var ht_in = $("#ht_in").val();
        var bmr = $("#bmr").data("bmr");
        var bmi = $("#bmi").data("bmi");
        var bmi_class = $("#bmi_class").data("bmi_class");
        var dbw = $("#dbw").data("dbw");     
        var lower_limit = $("#dbw_hwr").data("lower_lmt");
        var upper_limit = $("#dbw_hwr").data("upper_lmt");          
        var wc = $("#wc").val();
        var wc_opt = $("#wc_opt").val();
        var risk_indicator = $("#risk_indicator").data("risk_indicator");
        var hc = $("#hc").val();
        var hc_opt = $("#hc_opt").val();
        var whipr = $("#whipr").data("whipr");
        var whipr_class = $("#whipr_class").data("whipr_class");
        var whtr = $("#whtr").data("whtr");
        var whtr_class = $("#whtr_class").data("whtr_class");
        var pa_lvl = $("#pa_lvl").val();
        var cal = $("#cal_label").data("cal");
        var cho = $("#cho_label").data("cho");
        var protein = $("#pro_label").data("pro");
        var fat = $("#fat_label").data("fat");
        var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
        var ask_gestation= $('input[name=ask_gestation]:checked').val();
        var mens_date= $("#mens_date").val();
        var gestation_wks = $("#gestation_wks").val();
        var ask_lactation= $('input[name=ask_lactation]:checked').val();
        var decimal = /^\d{0,4}(\.\d{0,2})?$/;
    
  
        if (wt == '' || !decimal.test(wt) || wt > 500) {
            alert('Please enter a valid weight.');
            return false;
        } else if (ht == '' || !decimal.test(ht)|| ht > 243.8) {
            alert('Please enter a valid height in cm.');
            return false;
        } else if (ht_ft == '' || ht_in == '' || isNaN(ht_ft) || isNaN(ht_in) || ht_ft > 8) {
            alert('Please enter a valid height in ft/in.');
            return false;
        } else if (!decimal.test(bmr)|| bmr == '') {
            alert('Please enter a valid BMR.');
            return false;
        } else if (!decimal.test(bmi) || bmi == '') {
            alert('Please enter a valid BMI.');
            return false;
        } else if (bmi_class == '') {
            alert('Please enter BMI Classification.');
            return false;
        } else if(ask_pregnant == 1 && ask_gestation == 0 && mens_date == ''){
            alert('Please enter date of menstrual period.');
            return false;
        } else if ( dbw == '') {
            alert('Please enter DBW.');
            return false;
        }  /*else if (!decimal.test(lower_limit) || lower_limit == ''){
            alert('Please enter lower limit.');
            return false;
        } else if (!decimal.test(upper_limit) || upper_limit == ''){
            alert('Please enter upper limit.');
            return false;
        }*/ else if (wc == '' || !decimal.test(wc) || wc > 500) {
             alert('Please enter a valid waist circumference.');
             return false;
        } else if (hc == '' || !decimal.test(hc) || hc > 500) {
             alert('Please enter a valid hip circumference.');
             return false;
        } else if (whipr == '' || !decimal.test(whipr)) {
             alert('Please enter waist hip ratio.');
            return false;           
        } else if (whipr_class == '') {
             alert('Please enter waist hip ratio classification.');
             return false;
        } else if (whtr == '' || !decimal.test(whtr)) {
             alert('Please enter a valid waist height ratio.');
             return false;
        } else if (whtr_class == '') {
             alert('Please enter waist height ratio classification.');
             return false;
        } else if (pa_lvl == 0) {
            alert('Please enter physical activity level.');
            return false;
        } else if (!decimal.test(cal) || cal == '') {
            alert('Please enter a valid calorie.');
            return false;
        } else if (!decimal.test(cho) || cho == '') {
            alert('Please enter a valid carbohydrates.');
            return false;
        } else if (!decimal.test(protein) || protein == '') {
            alert('Please enter a valid protein.');
            return false;
        } else if (!decimal.test(fat) || fat == '') {
            alert('Please enter valid fat.');
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: base_url+'help/save_body_stats',
                data: "wt=" + wt + "&wt_opt=" + wt_opt + "&ht=" + ht + "&bmr="+ bmr +"&bmi=" + bmi + "&bmi_class=" + bmi_class + "&dbw=" + dbw +  "&lower_lmt=" + lower_limit + "&upper_lmt=" + upper_limit +  "&wc=" + wc + "&wc_opt=" + wc_opt + "&risk_indicator=" + risk_indicator + "&hc=" + hc + "&hc_opt=" + hc_opt + "&whipr=" + whipr + "&whipr_class=" + whipr_class + "&whtr=" + whtr + "&whtr_class=" + whtr_class + "&pa_lvl="+pa_lvl+"&cal="+cal+"&cho="+cho+"&protein="+protein+"&fat="+fat+"&ask_pregnant="+ask_pregnant+"&ask_gestation="+ask_gestation+"&mens_date="+mens_date+"&gestation_wks="+gestation_wks+"&ask_lactation="+ask_lactation,
                success: function(html) {
                    if (html == 'success') {
                        $("#alert").html("Measurement successfully saved.");
                        $('#alert').addClass('alert alert-success');
                        $('#alert').focus();
                        setTimeout("location.reload(true);", 1000);
                    }  else {
                        $("#alert").html("Error: Something is wrong when saving the data.");
                        $('#alert').addClass('alert alert-danger');
                        $('#alert').focus();
                    }
                },
                beforeSend: function() {
                    $("#alert").html("Loading...");
                    $('#alert').addClass('alert alert-success');
                    $('#alert').focus();
                }
            });
        }
        return false; 
    });



  
   $(document).on("click", ".delete_body_stats", function() {

    var id = $(this).attr("id");
    var dataString = 'id=' + id;
    var parent = $(this).closest("div");
    var answer = confirm("Are you sure you want to delete from the database?");
    if (answer) {
      console.log(dataString);
      $.ajax({
        type: "POST",
        url: base_url + 'help/delete_body_stats',
        data: dataString,
        cache: false,
        /*beforeSend: function() {
          parent.animate({
            'backgroundColor': '#fb6c6c'
          }, 300).animate({
            opacity: 0.35
          }, "slow");;
        },*/
        success: function() {
          /*parent.slideUp('slow', function() {
            $(this).remove();
          });*/
           $("#alert1").html("Measurement successfully deleted.");
           $('#alert1').addClass('alert alert-success');
           $('#alert1').focus();
          setTimeout("location.reload(true);", 1000);
        }
      });
    } else {
      return false;
    }
    return false;
    // });
  });



  
 


$(document).on("click", "#update_stat", function() {
  
        var wt = $("#wt").val();
        var wt_opt = $("#wt_opt").val();
        var ht = $("#ht").val();
        var ht_ft = $("#ht_ft").val();
        var ht_in = $("#ht_in").val();
        var bmr = $("#bmr").data("bmr");
        var bmi = $("#bmi").data("bmi");
        var bmi_class = $("#bmi_class").data("bmi_class");
        var dbw = $("#dbw").data("dbw");     
        var lower_limit = $("#dbw_hwr").data("lower_lmt");
        var upper_limit = $("#dbw_hwr").data("upper_lmt");          
        var wc = $("#wc").val();
        var wc_opt = $("#wc_opt").val();
        var risk_indicator = $("#risk_indicator").data("risk_indicator");
        var hc = $("#hc").val();
        var hc_opt = $("#hc_opt").val();
        var whipr = $("#whipr").data("whipr");
        var whipr_class = $("#whipr_class").data("whipr_class");
        var whtr = $("#whtr").data("whtr");
        var whtr_class = $("#whtr_class").data("whtr_class");
        var pa_lvl = $("#pa_lvl").val();
        var cal = $("#cal_label").data("cal");
        var cho = $("#cho_label").data("cho");
        var protein = $("#pro_label").data("pro");
        var fat = $("#fat_label").data("fat");
        var ask_pregnant = $('input[name=ask_pregnant]:checked').val();
        var ask_gestation= $('input[name=ask_gestation]:checked').val();
        var mens_date= $("#mens_date").val();
        var gestation_wks = $("#gestation_wks").val();
        var ask_lactation= $('input[name=ask_lactation]:checked').val();
        var decimal = /^\d{0,4}(\.\d{0,2})?$/;
        var id = $("#id").val();    
  
        if (wt == '' || !decimal.test(wt) || wt > 500) {
            alert('Please enter a valid weight.');
            return false;
        } else if (ht == '' || !decimal.test(ht)|| ht > 243.8) {
            alert('Please enter a valid height in cm.');
            return false;
        } else if (ht_ft == '' || ht_in == '' || isNaN(ht_ft) || isNaN(ht_in) || ht_ft > 8) {
            alert('Please enter a valid height in ft/in.');
            return false;
        } else if (!decimal.test(bmr)|| bmr == '') {
            alert('Please enter a valid BMR.');
            return false;
        } else if (!decimal.test(bmi) || bmi == '') {
            alert('Please enter a valid BMI.');
            return false;
        } else if (bmi_class == '') {
            alert('Please enter BMI Classification.');
            return false;
        } else if(ask_pregnant == 1 && ask_gestation == 0 && mens_date == ''){
            alert('Please enter date of menstrual period.');
            return false;
        } else if ( dbw == '') {
            alert('Please enter DBW.');
            return false;
        }  /*else if (!decimal.test(lower_limit) || lower_limit == ''){
            alert('Please enter lower limit.');
            return false;
        } else if (!decimal.test(upper_limit) || upper_limit == ''){
            alert('Please enter upper limit.');
            return false;
        }*/ else if (wc == '' || !decimal.test(wc) || wc > 500) {
             alert('Please enter a valid waist circumference.');
             return false;
        } else if (hc == '' || !decimal.test(hc) || hc > 500) {
             alert('Please enter a valid hip circumference.');
             return false;
        } else if (whipr == '' || !decimal.test(whipr)) {
             alert('Please enter waist hip ratio.');
            return false;           
        } else if (whipr_class == '') {
             alert('Please enter waist hip ratio classification.');
             return false;
        } else if (whtr == '' || !decimal.test(whtr)) {
             alert('Please enter a valid waist height ratio.');
             return false;
        } else if (whtr_class == '') {
             alert('Please enter waist height ratio classification.');
             return false;
        } else if (pa_lvl == 0) {
            alert('Please enter physical activity level.');
            return false;
        } else if (!decimal.test(cal) || cal == '') {
            alert('Please enter a valid calorie.');
            return false;
        } else if (!decimal.test(cho) || cho == '') {
            alert('Please enter a valid carbohydrates.');
            return false;
        } else if (!decimal.test(protein) || protein == '') {
            alert('Please enter a valid protein.');
            return false;
        } else if (!decimal.test(fat) || fat == '') {
            alert('Please enter valid fat.');
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: base_url+'help/update_body_stats',
                data: "wt=" + wt + "&wt_opt=" + wt_opt + "&ht=" + ht + "&bmr="+ bmr +"&bmi=" + bmi + "&bmi_class=" + bmi_class + "&dbw=" + dbw +  "&lower_lmt=" + lower_limit + "&upper_lmt=" + upper_limit +  "&wc=" + wc + "&wc_opt=" + wc_opt + "&risk_indicator=" + risk_indicator + "&hc=" + hc + "&hc_opt=" + hc_opt + "&whipr=" + whipr + "&whipr_class=" + whipr_class + "&whtr=" + whtr + "&whtr_class=" + whtr_class + "&pa_lvl="+pa_lvl+"&cal="+cal+"&cho="+cho+"&protein="+protein+"&fat="+fat+"&ask_pregnant="+ask_pregnant+"&ask_gestation="+ask_gestation+"&mens_date="+mens_date+"&gestation_wks="+gestation_wks+"&ask_lactation="+ask_lactation+"&id="+id,
                success: function(html) {
                  //alert(data);
                    if (html == 'success') {
                        $("#alert").html("Measurement successfully updated.");
                        $('#alert').addClass('alert alert-success');
                        $('#alert').focus();
                        setTimeout("location.reload(true);", 1000);
                    } else if (html == 'error') {
                        $("#alert").html("You have already submitted a record for this appointment. Please try on another appointment. Thank you!");
                        $('#alert').addClass('alert alert-danger');
                        $('#alert').focus();
                    } else if (html == 'error1') {
                        $("#alert").html("Error! Client have already finished on the appointment. Please contact RND personnel for another appointment.");
                        $('#alert').addClass('alert alert-danger');
                        $('#alert').focus();
                    } else {
                        $("#alert").html("Error: Something is wrong when saving the data.");
                        $('#alert').addClass('alert alert-danger');
                        $('#alert').focus();
                    }
                },
                beforeSend: function() {
                    $("#alert").html("Loading...");
                    $('#alert').addClass('alert alert-success');
                    $('#alert').focus();
                }
            });
        }
        return false; 
    });




  $(document).on("change", "#pa_entry_date", function() {
    var a = $(this).val();
    //var baseurl = base_url + 'help/search_foodtracker/'+a;
    $('#search_pa_date').attr("href", base_url + 'help/search_pa_tracker/' + a);
  });
  $(document).on("click", "#pa_entry_date", function() {
    $.ajax({
      url: base_url + 'help/get_pa_entry_dates',
      //  data: "fast_pa_lvl=" + fast_pa_lvl,
      method: "GET",
      success: function(retrieved_data) {
        // Your code here.. use something like this
        Obj = retrieved_data;
        $("#pa_entry_date").datepicker({
          dateFormat: 'yy-mm-dd',
          beforeShowDay: function(date) {
            var myBadDates = Obj;
            var $return = true;
            var $returnclass = "available";
            $checkdate = $.datepicker.formatDate('yy-mm-dd', date);
            // start loop
            for (var x in myBadDates) {
              $myBadDates = new Array(myBadDates[x]['entry_date']);
              for (var i = 0; i < $myBadDates.length; i++)
                if ($myBadDates[i] == $checkdate) {
                  $return = false;
                  $returnclass = "unavailable";
                  return [true, 'ui-state-highlight', event.text];
                }
            }
            //end loop
            return [$return, $returnclass];
          }
        });
      }
    });
  });


    $(document).on("click", ".add_pa", function() {
    var x = $(this).data("count");
    var time = $("#time" + x).val();
    var pa_code = $("#pa_code" + x).val();
    var duration = $("#duration" + x).val();
    var pa_cal = $("#pa_cal" + x).val();
    var entrydate = $(this).data("entrydate");
    var timeformat = /^\s*(0?\d|1[0-2]):[0-5]\d(\s+(AM|PM))?\s*$/i;
    var minformat = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/;
    if (!time.match(timeformat)) {
      alert("Please enter correct time format.");
      $("#time" + x).focus();
      return false;
    }
    /*else if(duration < 1  ||  duration > 60)  {
      alert("Please enter correct duration.");
      $("#duration"+x).focus();
      return false;   
    }*/
    else {
      $.ajax({
        type: "POST",
        url: base_url + 'help/save_pa',
        data: "pa_code=" + pa_code + "&time=" + time + "&duration=" + duration + "&pa_cal=" + pa_cal + "&entrydate=" + entrydate,
        success: function(html) {
          if (html == 'success') {
            $("#shadow").fadeOut();
            $("#alert" + x).html("Physical activity successfully saved.");
            $('#alert' + x).addClass('alert alert-success');
            $('#alert' + x).focus();
            setTimeout("location.reload(true);", 1000);
          }
        },
        beforeSend: function() {
          $("#alert" + x).html("Loading...");
          $('#alert' + x).addClass('alert alert-success');
          $('#alert' + x).focus();
        }
      });
    }
  });
  $(document).on("click", ".delete_pa", function() {
    var id = $(this).attr("id");
    var dataString = 'id=' + id;
    var parent = $(this).closest("tr");
    var answer = confirm("Are you sure you want to delete from the database?");
    if (answer) {
      console.log(dataString);
      $.ajax({
        type: "POST",
        url: base_url + 'help/delete_pa',
        data: dataString,
        cache: false,
        beforeSend: function() {
          parent.animate({
            'backgroundColor': '#fb6c6c'
          }, 300).animate({
            opacity: 0.35
          }, "slow");;
        },
        success: function() {
          parent.slideUp('slow', function() {
            $(this).remove();
          });
          setTimeout("location.reload(true);", 1000);
        }
      });
    } else {
      return false;
    }
    return false;
    // });
 
 });

  $(document).on("click", "#edit_pa1", function() {
    var x = $(this).data("count");
    var time1 = $("#time0" + x).val();
    var pa_code1 = $("#pa_code0" + x).val();
    var duration1 = $("#duration0" + x).val();
    var pa_cal1 = $("#pa_cal0" + x).val();
    var rowid = $("#rowid").val();
    $.ajax({
      type: "POST",
      url: base_url + 'help/update_pa',
      data: "pa_code1=" + pa_code1 + "&time1=" + time1 + "&duration1=" + duration1 + "&pa_cal1=" + pa_cal1 + "&rowid=" + rowid,
      success: function(html) {
        //alert(data);
        if (html == 'success') {
          $("#shadow").fadeOut();
          $("#alert_1").html("Physical activity successfully updated.");
          $('#alert_1').addClass('alert alert-success');
          $('#alert_1').focus();
          setTimeout("location.reload(true);", 1000);
        } else {
          $("#alert_1").html("Error: Something is wrong when saving the data.");
          $('#alert_1').addClass('alert alert-danger');
          $('#alert_1').focus();
        }
      },
      beforeSend: function() {
        $("#alert_1").html("Loading...");
        $('#alert_1').addClass('alert alert-success');
        $('#alert_1').focus();
      }
    });
  });




  $("#pa_tracker").load(base_url + 'help/create_pa_tracker');
  var entry_date = $("#entry_date").val();
  $("#search_pa_tracker").load(base_url + 'help/create_search_pa_tracker/' + entry_date);
  $('#body_stats_records').dataTable({
    "aaSorting": []
  });




  $(function() {
    $("#body_stats_dialog").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      width: 'auto',
      height: 800,
      create: function(event, ui) {
        // Set max-width
        $(this).parent().css("maxWidth", "990px");
      }
    });
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click", ".add_body_stats", function(e) {
      e.preventDefault();
      // var id = $(this).attr("id");
      //  var dataString = 'id=' + id;
      $.ajax({
        type: "GET",
        url: base_url + 'help/add_body_statistics',
        // data: dataString,
        success: function(res) {
          $("#body_stats_dialog").html(res);
          $("#body_stats_dialog").dialog("open");
          //  ht_conv();
          $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
          $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
        }
      });
    });
  });
  $(function() {
    $("#body_stats_dialog").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      width: 'auto',
      height: 800,
      create: function(event, ui) {
        // Set max-width
        $(this).parent().css("maxWidth", "990px");
      }
    });
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click", ".view_previous", function(e) {
      e.preventDefault();
      var id = $(this).attr("id");
      var dataString = 'id=' + id;
      $.ajax({
        type: "GET",
        url: base_url + 'help/view_body_statistics',
        data: dataString,
        success: function(res) {
          $("#body_stats_dialog").html(res);
          $("#body_stats_dialog").dialog("open");
          // ht_conv();
          $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
          $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
        }
      });
    });
  });
  $(function() {
    $("#body_stats_dialog").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      width: 'auto',
      height: 800,
      create: function(event, ui) {
        // Set max-width
        $(this).parent().css("maxWidth", "990px");
      }
    });
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click", ".edit_body_stats", function(e) {
      e.preventDefault();
      var id = $(this).attr("id");
      var dataString = 'id=' + id;
      $.ajax({
        type: "GET",
        url: base_url + 'help/edit_body_statistics',
        data: dataString,
        success: function(res) {
          $("#body_stats_dialog").html(res);
          $("#body_stats_dialog").dialog("open");
          ht_conv();
          $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
          $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
        }
      });
    });
  });
  $(function() {
    $("#edit_profile").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      width: 600,
      create: function(event, ui) {
        // Set max-width
        $(this).parent().css("maxWidth", "900px");
      }
    });
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click", ".edit_info", function(e) {
      e.preventDefault();
      var id = $(this).attr("id");
      var dataString = 'id=' + id;
      $.ajax({
        type: "GET",
        url: base_url + 'help/edit_info',
        data: dataString,
        success: function(res) {
          $("#edit_profile").html(res);
          $("#edit_profile").dialog("open");
          $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
          $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
        }
      });
    });
  });
  $(function() {
    $("#edit_profile").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      width: 'auto',
      height: 'auto',
      create: function(event, ui) {
        // Set max-width
        $(this).parent().css("maxWidth", "900px");
      }
    });
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click", ".edit_photo", function(e) {
      e.preventDefault();
      var id = $(this).attr("id");
      var dataString = 'id=' + id;
      $.ajax({
        type: "GET",
        url: base_url + 'help/edit_client_photo',
        data: dataString,
        success: function(res) {
          $("#edit_profile").html(res);
          $("#edit_profile").dialog("open");
          $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
          $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
        }
      });
    });
  });
  $(function() {
    $("#edit_profile").dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      width: 'auto',
      height: 'auto',
      create: function(event, ui) {
        // Set max-width
        $(this).parent().css("maxWidth", "900px");
      }
    });
    //$(".ui-dialog").addClass("ui-widget-header");
    $(".ui-dialog").addClass("ui-widget-content");
    $(document).on("click", ".edit_acct", function(e) {
      e.preventDefault();
      var id = $(this).attr("id");
      var dataString = 'id=' + id;
      $.ajax({
        type: "GET",
        url: base_url + 'help/edit_acct',
        data: dataString,
        success: function(res) {
          $("#edit_profile").html(res);
          $("#edit_profile").dialog("open");
          $('.ui-dialog-titlebar-close').addClass('ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only');
          $('.ui-dialog-titlebar-close').append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>');
        }
      });
    });
  });
  $.ajax({
    url: base_url + 'help/get_pa_food_entry_dates',
    //  data: "fast_pa_lvl=" + fast_pa_lvl,
    method: "GET",
    success: function(retrieved_data) {
      // Your code here.. use something like this
      Obj = retrieved_data;
      $("#pa_food_entry_date").datepicker({
        dateFormat: 'yy-mm-dd',
        beforeShowDay: function(a) {
          var myBadDates = Obj;
          var $return = true;
          var $returnclass = "available";
          $checkdate = $.datepicker.formatDate('yy-mm-dd', a);
          // start loop
          for (var x in myBadDates) {
            $myBadDates = new Array(myBadDates[x]['entry_date']);
            for (var i = 0; i < $myBadDates.length; i++)
              if ($myBadDates[i] == $checkdate) {
                $return = false;
                $returnclass = "unavailable";
                return [true, 'ui-state-highlight', event.text];
              }
          }
          //end loop
          return [$return, $returnclass];
        }
      });
    }
  });


  $(document).on("click", ".add_menu", function() {
    var i = $(this).data("meal_id");
    var meal_id = $(this).attr("value");
    var menu_name = $("#menu_name" + i).val();
    //var client_id = $(this).data("client_id");
    var entry_date = $(this).data("entry_date");
    // var ii =  $("#meal_id"+i).val();   
    if (meal_id == '' || isNaN(meal_id)) {
      alert('Please enter meal.');
      return false;
    } else if (menu_name == '') {
      alert('Please enter menu name.');
      return false;
    } else {
      $.ajax({
        type: "POST",
        url: base_url + 'help/save_menu',
        data: "menu_name=" + menu_name + "&value=" + meal_id + '&entry_date=' + entry_date,
        success: function(html) {
          if (html == 'success') {
            $("#alert" + i).html("Menu successfully created!");
            $('#alert' + i).addClass('alert alert-success');
            $("#alert" + i).focus();
            setTimeout("location.reload(true);", 1000);
          } else {
            $("#alert" + i).html("Error: Something is wrong when saving the data.");
            //    alert('Error: Something is wrong when saving the data.');
            $('#alert' + i).addClass('alert alert-danger');
            $("#alert" + i).focus();
          }
        },
      });
      return false;
    }
  });

  $(document).on("click", "#update_menu", function(e) {
    var menu_id = $(this).data("menu_id");
    var menu_name = $("#menu_name").val();
    //alert(menu_id);
    if (menu_id == '' || isNaN(menu_id)) {
      alert('Please enter menu id.');
      return false;
    } else if (menu_name == '') {
      alert('Please enter menu name.');
      return false;
    } else {
      $.ajax({
        type: "POST",
        url: base_url+'help/update_menu',
        data: "menu_name=" + menu_name + "&menu_id=" + menu_id,
        success: function(html) {
          if (html == 'success') {
            
            $("#alert_1").html("Menu successfully updated.");
            $('#alert_1').addClass('alert alert-success');
                        $('#alert_1').focus();
            setTimeout("location.reload(true);", 1000);
            e.preventDefault();
          } else {
            //$("#alert1").html("Error: Something is wrong when saving the data.");
            //document.getElementById('alert1').setAttribute("class","alert alert-danger"); 
            $("#alert_1").html("Error: Something is wrong when saving the data.");
            $('#alert_1').addClass('alert alert-danger');
                        $('#alert_1').focus();

            
          }
        },
      });
      return false;
    }
  });
  //$(".add_food").each(function(index) {
  $(document).on("click", ".add_food", function() {
    //menu_id
    var x = $(this).data("count");
    var ii = $(this).data("meal_id");
    var form_data = new FormData();
    var file_data = $("#aa" + x).prop('files')[0];
    //var file_data = object.get(0).files[i];
    //var other_data = $('form').serialize(); 
    form_data.append('file', file_data);
    var menu_id = $(this).attr("value");
    var meal_id = $("#meal_id" + x).val();
    var fic = $("#fic" + x).val();
    var hh_val = $("#hh_val" + x).val();
    var hh_m = $("#hh_m" + x).val();
    var ep_wt = $("#ep_wt" + x).val();
    var cal = $("#comp_cal" + x).val();
    var cho = $("#comp_cho" + x).val();
    var pro = $("#comp_pro" + x).val();
    var fat = $("#comp_fat" + x).val();
    var entry_date = $(this).data("entry_date");
    if (menu_id == '' || isNaN(menu_id)) {
      alert('Please enter menu.');
      return false;
    } else if (meal_id == '' || isNaN(meal_id)) {
      alert('Please enter meal.');
      return false;
    } else if (fic == '') {
      alert('Please enter fooditem.');
      return false;
    } else if (hh_val == '') {
      alert('Please enter household value.');
      return false;
    } else if (hh_m == 0) {
      alert('Please enter household measure.');
      return false;
    } else {
      $.ajax({
        url: base_url + 'help/save_food?menu_id=' + menu_id + '&meal_id=' + meal_id + '&fic=' + fic + '&hh_val=' + hh_val + '&hh_m=' + hh_m + '&ep_wt=' + ep_wt + '&comp_cal=' + cal + '&comp_cho=' + cho + '&comp_pro=' + pro + '&comp_fat=' + fat + '&entry_date=' + entry_date, // point to server-side PHP script 
        //  url: 'save_food?client_id='+client_id+'&menu_id='+menu_id+'&meal_id='+meal_id+'&fic='+fic+'&hh_val='+hh_val, 
        //dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: "POST",
        success: function(html) {
          //alert(data);
          if (html == 'success') {
            $("#alert" + ii).html("Food successfully saved!");
            $('#alert' + ii).addClass('alert alert-success');
            $("#alert" + ii).focus();
            setTimeout("location.reload(true);", 1000);
          } else {
            $("#alert" + ii).html("Error: Something is wrong when saving the data.");
            //    alert('Error: Something is wrong when saving the data.');
            $('#alert' + ii).addClass('alert alert-danger');
            $("#alert" + ii).focus();
          }
        }
      });
    }
  });
  $(document).on("click", ".delete_food", function() {
    var id = $(this).attr("id");
    var dataString = 'id=' + id;
    var parent = $(this).closest("tr");
    var answer = confirm("Are you sure you want to delete from the database?");
    if (answer) {
      console.log(dataString);
      $.ajax({
        type: "POST",
        url: base_url + 'help/delete_food',
        data: dataString,
        cache: false,
        beforeSend: function() {
          parent.animate({
            'backgroundColor': '#fb6c6c'
          }, 300).animate({
            opacity: 0.35
          }, "slow");;
        },
        success: function(data) {
          parent.slideUp('slow', function() {
            $(this).remove();
          });
          setTimeout("location.reload(true);", 1000);
        }
      });
    } else {
      return false;
    }
    return false;
    // });
  });
  $(document).on("click", ".delete_menu", function() {
    var id = $(this).attr("id");
    var dataString = 'id=' + id;
    var parent = $(this).closest("div");
    var answer = confirm("Are you sure you want to delete from the database?");
    if (answer) {
      $.ajax({
        type: "POST",
        url: base_url + 'help/delete_menu',
        data: dataString,
        cache: false,
        /* beforeSend: function()
         {
         parent.animate({'backgroundColor':'#fb6c6c'},300).animate({ opacity: 0.35 }, "slow");;
         }, */
        success: function() {
          parent.slideUp('slow', function() {
            $(this).remove();
          });
          setTimeout("location.reload(true);", 1000);
        }
      });
    } else {
      return false;
    }
    return false;
  });


   $(document).on("click", ".edit_food1", function() {
    var x = $(this).data("count1");
    var file_data1 = $("#aa0" + x).prop('files')[0];
    var form_data1 = new FormData(); //var file_data = object.get(0).files[i];
    //var other_data = $('form').serialize(); 
    form_data1.append('file', file_data1);
    //var client_id1 = $(this).data("client_id1");
    //var menu_id1 = $(this).attr("value");
    var meal_id1 = $("#meal_id0" + x).val();
    var fic1 = $("#fic0" + x).val();
    var hh_val1 = $("#hh_val0" + x).val();
    var hh_m1 = $("#hh_m0" + x).val();
    var ep_wt1 = $("#ep_wt0" + x).val();
    var cal1 = $("#comp_cal0" + x).val();
    var cho1 = $("#comp_cho0" + x).val();
    var pro1 = $("#comp_pro0" + x).val();
    var fat1 = $("#comp_fat0" + x).val();
    var image1 = $("#image0" + x).val();
    var rowid = $("#rowid").val();
    $.ajax({
      url: base_url + 'help/update_food?meal_id1=' + meal_id1 + '&fic1=' + fic1 + '&hh_val1=' + hh_val1 + '&hh_m1=' + hh_m1 + '&ep_wt1=' + ep_wt1 + '&comp_cal1=' + cal1 + '&comp_cho1=' + cho1 + '&comp_pro1=' + pro1 + '&comp_fat1=' + fat1 + '&image1=' + image1 + '&rowid=' + rowid, // point to server-side PHP script 
      //dataType: 'text',  // what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      data: form_data1,
      type: "POST",
      success: function(html) {
        //alert(data); // display response from the PHP script, if any
        if (html == 'success') {
          $("#shadow").fadeOut();
          $("#alert_1").html("Food successfully updated.");
          $('#alert_1').addClass('alert alert-success');
          $('#alert_1').focus();
          setTimeout("location.reload(true);", 1000);
        } else {
          $("#alert_1").html("Error: Something is wrong when saving the data.");
          $('#alert_1').addClass('alert alert-danger');
          $('#alert_1').focus();
        }
      },
      beforeSend: function() {
        $("#alert_1").html("Loading...");
        $('#alert_1').addClass('alert alert-success');
        $('#alert_1').focus();
      }
    });
  });

  //$(document).ready(function(){
  $(document).on("click", "#compare_summary", function() {
    var pa_food_entry_date = $("#pa_food_entry_date").val();
    $.ajax({
      type: "POST",
      url: base_url + 'help/compare_pa_food',
      data: "pa_food_entry_date=" + pa_food_entry_date,
      success: function(data) {
        $("#summary_div").html(data);
        //alert(data);
      },
    });
  });
});