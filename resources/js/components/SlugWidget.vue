<template>
    <div class="slug-widget">
        <div class="url-wrapper" v-show="slug.length > 0">
            <i class="fa fa-link"></i>
            <span class="root-url">{{ url }}</span
            ><span class="slug-url" v-show="slug && !isEditing">{{ slug }}</span
            ><span class="slug-url" v-show="isEditing"><input type="text" v-model="customSlug"></span>
            <button class="btn btn-outline-dark btn-sm" v-show="!isEditing" @click.prevent="editSlug"><i class="fa fa-edit"></i></button>
            <button class="btn btn-outline-dark btn-sm" v-show="isEditing" @click.prevent="saveSlug"><i class="fa fa-save"></i></button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            url: {
                type: String,
                required: true
            },
            title: {
                type: String,
                required: true
            },
            api_token: {
                type: String,
                required: true
            },
            has_slug: {
                type: String,
                required: false,
            }
        },
        data: function() {
            return {
                slug: this.has_slug ? this.has_slug : '',
                isEditing: false,
                customSlug: '',
                wasEdited: false
            }
        },
        methods: {
            editSlug: function() {
                this.customSlug = this.slug;
                this.isEditing = true;
            },
            saveSlug: function() {
                this.setSlug(this.customSlug);
                this.isEditing = false;
                this.wasEdited = true;
            },
            setSlug: function(newVal, count = 0) {
                // Slugify the newVal
                let slug = Slug(newVal + ( count > 0 ? `-${count}`: ''));
                let vm = this;
                // Test to see if unique
                if(this.api_token && slug) {
                    axios.get('/api/posts/unique', {
                        params: {
                            api_token: vm.api_token,
                            slug: slug
                        }
                    }).then(function(response) {
                        // if unique, then set the slug
                        if(response.data) {
                            vm.slug = slug;
                            vm.$emit('slug-changed', slug);
                        } else {
                            vm.setSlug(newVal, count+1);
                        }
                        // if not, customize and make it unique and test again
                    }).catch(error => console.log(error));
                }
            }
        },
        watch: {
            title: _.debounce(function() {
                if(this.wasEdited == false) this.setSlug(this.title);
            }, 3000)
        }
        
    }
</script>

<style scoped>
    .url-wrapper > i {
        margin-right: 10px;
    }
    .slug-url {
        background: #ffffa6;
        padding: 4px 0px;
    }
</style>
