$(document).ready(function(){
        $('.razorpay_btn').click(function(e) {
          e.preventDefault();

          var firstname = $('.firstname').val();
          var lastname = $('.lastname').val();
          var email = $('.email').val();
          var phone = $('.phone').val();
          var address1 = $('.address1').val();
          var address2 = $('.address2').val();
          var city = $('.city').val();
          var state = $('.state').val();
          var country = $('.country').val();
          var pincode = $('.pincode').val();

          if(!firstname)
          {
            fname_error = "harap masukan nama";
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
          }
          else
          {
            fname_error = "";
            $('#fname_error').html('');
          }

          if(!lastname)
          {
            lname_error = "harap masukan nama";
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
          }
          else
          {
            lname_error = "";
            $('#lname_error').html('');
          }

          if(!email)
          {
            email_error = "harap masukan email";
            $('#email_error').html('');
            $('#email_error').html(email_error);
          }
          else
          {
            email_error = "";
            $('#email_error').html('');
          }

          if(!phone)
          {
            phone_error = "harap masukan no telepon";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
          }
          else
          {
            phone_error = "";
            $('#phone_error').html('');
          }

          if(!address1)
          {
            address1_error = "wajib di isi";
            $('#address1_error').html('');
            $('#address1_error').html(address1_error);
          }
          else
          {
            address1_error = "";
            $('#address1_error').html('');
          }

          if(!address2)
          {
            address2_error = "wajib di isi";
            $('#address2_error').html('');
            $('#address2_error').html(address2_error);
          }
          else
          {
            address2_error = "";
            $('#address2_error').html('');
          }

          if(!city)
          {
            city_error = "wajib di isi";
            $('#city_error').html('');
            $('#city_error').html(city_error);
          }
          else
          {
            city_error = "";
            $('#city_error').html('');
          }

          if(!state)
          {
            state_error = "wajib di isi";
            $('#state_error').html('');
            $('#state_error').html(state_error);
          }
          else
          {
            state_error = "";
            $('#state_error').html('');
          }

          if(!country)
          {
            country_error = "wajib di isi";
            $('#country_error').html('');
            $('#country_error').html(country_error);
          }
          else
          {
            country_error = "";
            $('#country_error').html('');
          }

          if(!pincode)
          {
            pincode_error = "wajib di isi";
            $('#pincode_error').html('');
            $('#pincode_error').html(pincode_error);
          }
          else
          {
            pincode_error = "";
            $('#pincode_error').html('');
          }


          if(fname_error != '' || lname_error != '' || email_error != '' || phone_error != '' || address1_error != '' || address2_error != '' || city_error != '' || state_error != '' || country_error != '' || pincode_error != '' )
          {
            return false;
          }
          else
          {
            
          }
        })
    })