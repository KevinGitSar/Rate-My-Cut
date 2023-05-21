<template>
    <div>
        <form>
            <!-- <label class="w-1/4" for="image">Image Chosen</label> -->
            <input type="file" accept="image/*" name="image" @change="onFileChange" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"/>
        </form>

        <div id="preview">
            <img v-if="url" :src="url" />
        </div>
    </div>
</template>

<script>

    export default 
    {
        data(){
            return {
                url: null,
            }
        },
        methods: {
            onFileChange(e){
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file);
            }
        }
    }
</script>

<style scoped>
</style>
