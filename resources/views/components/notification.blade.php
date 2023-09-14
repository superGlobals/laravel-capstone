<div x-data="{ open: false }" x-show="open"
    @notify.window="Toastify({
text: $event.detail.message,
duration: 3000,
newWindow: true,
gravity: 'top',
position: 'center',
stopOnFocus: true,
style: {
background: ($event.detail.title === 'success') ? 'linear-gradient(to right, #00b09b, #96c93d)' : 'linear-gradient(to right, #f02b2b, #96c93d)',
},
onClick: function(){} // Callback after click
}).showToast();">
    >
</div>
