const { createApp } = Vue

createApp({
    data() {
        return {
            productFilter: 'All',
            showCart: false,
            cartNotif: false,
            cart: [],
            total: 0,
            purchase: false,
            loading: false,
            confirmation: false
        }
    },
    methods: {
        // Add Product Info to Array Cart
        addToCart(item) {
            this.cart.push(item),
            this.showCart = true,
            this.cartNotif = true
        },
        // Remove Product from Array Cart
        removeFromCart(position) {
            this.cart.splice(position, 1)
        },
        // Update total price
        getTotal(){
            this.total = 0,
            this.cart.forEach(element => {
                this.total += element.price
            });
            return this.total
        },
        // Return Cart Items Number
        getItemsNum() {
            if (this.cart.length > 0) {
                return this.cart.length
            } else {
                this.cartNotif = false
            }     
        },
        // Confirm purchase and set empy Cart
        oneClickCheckout() {
            this.cart = [],
            this.showCart = false,
            this.loading = true,
            this.purchase = true,
            setTimeout(() => {
                this.loading = false,
                this.confirmation = true
            }, 1 * 8000);
            setTimeout(() => {
                this.confirmation = false,
                this.purchase = false
            }, 1 * 20000);
        }
    },
    mounted() {
        console.log("Hello from VueJS 👋")
    }
}).mount('#app')