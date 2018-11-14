<template>
    <div class="alert alert-secondary alert-dismissible fade show" style="border-radius: 0px" role="alert">
        <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-inner--text"><strong>SEO Tip!</strong> {{ randomSeoTip }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            SEO: [
                'Keep your title short and precise with less than 60 chars!',
                'Keep your excerpt short and precise with less than 160 chars!',
                'Try to include CTA phrases in your article (such as Learn More, Click here..) to grab readers\' attention!',
            ],
        }
    },
    computed: {
        randomSeoTip() { 
            return this.SEO[Math.floor(Math.random() * this.SEO.length)];
        },
    }
}
</script>
