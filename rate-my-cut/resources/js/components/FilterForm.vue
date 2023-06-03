<template>
    <form :action="'/'" method="GET">
        <div class="my-2">
            <h4 class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 text-lg text-shadow">Location</h4>
            <div>
            </div>
        </div>
        
        <div class="my-2">
            <h4 @click="category = !category" class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 text-lg text-shadow">Category</h4>
            <div v-if="category">
                <input type="checkbox" id="category1" name="category1" value="W">
                <label for="category1">Women</label><br>

                <input type="checkbox" id="category2" name="category2" value="M">
                <label for="category2">Men</label><br>

                <input type="checkbox" id="category3" name="category3" value="G">
                <label for="category3">Girls</label><br>

                <input type="checkbox" id="category4" name="category4" value="B">
                <label for="category4">Boys</label><br>
            </div>
        </div>    
        
        <div class="my-2">
            <h4 @click="length = !length" class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 text-lg text-shadow">Hair Length</h4>
            <div v-if="length">
                <input type="checkbox" id="length1" name="length1" value="short">
                <label for="length1">Short</label><br>

                <input type="checkbox" id="length2" name="length2" value="medium">
                <label for="length2">Medium</label><br>

                <input type="checkbox" id="length3" name="length3" value="long">
                <label for="length3">Long</label><br>

                <input type="checkbox" id="length4" name="length4" value="ear length">
                <label for="length4">Ear Length</label><br>

                <input type="checkbox" id="length5" name="length5" value="chin length">
                <label for="length5">Chin Length</label><br>

                <input type="checkbox" id="length6" name="length6" value="shoulder length">
                <label for="length6">Shoulder Length</label><br>

                <input type="checkbox" id="length7" name="length7" value="armpit length">
                <label for="length7">Armpit Length</label><br>

                <input type="checkbox" id="length8" name="length8" value="mid-back length">
                <label for="length8">Mid-back Length</label><br>

                <input type="checkbox" id="length9" name="length9" value="tailbone length">
                <label for="length9">Tailbone Length</label><br>
            </div>
        </div>

        <div class="my-2">
            <h4 @click="type = !type" class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 text-lg text-shadow">Hair Type</h4>
            <div v-if="type">
                <input type="checkbox" id="type1" name="type1" value="straight">
                <label for="type1">Straight</label><br>

                <input type="checkbox" id="type2" name="type2" value="wavy">
                <label for="type2">Wavy</label><br>

                <input type="checkbox" id="type3" name="type3" value="curly">
                <label for="type3">Curly</label><br>

                <input type="checkbox" id="type4" name="type4" value="coil">
                <label for="type4">Coil</label><br>
            </div>
        </div>    
        
        <div class="mt-2">
            <h4 @click="style = !style" class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 text-lg text-shadow">Hair Style</h4>
            <div v-if="style">
                <label for="style">Style</label><br>
                <input  class="w-36" type="text" id="style" name="style" placeholder="Ex: Buzz" />
            </div>
        </div> 
        
        <div class="mt-2">
            <button type="submit" class="bg-[#FFCB77] w-36 h-9 rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">Apply Filters</button>
        </div>
    </form>
</template>

<script>
    export default 
    {
        data(){
            return{
                category: false,
                length: false,
                type: false,
                style: false,
            }
        }
    }
</script>

<style scoped>
</style>
