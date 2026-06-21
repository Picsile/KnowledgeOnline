function createToast(message, type) {
   const el = $(`<div class="my-toast alert-${type} alert alert-dismissible"></div>`).text(message);

   $("#for-toasts").append(el);

   setTimeout(() => el.addClass("show"), 100);

   setTimeout(() => {
      el.removeClass("show");

      setTimeout(() => el.remove(), 500);
   }, 3000);
}
