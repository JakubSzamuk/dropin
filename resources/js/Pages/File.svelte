<script lang="ts">
    let header = "New File";

    console.log(header)
</script>

<main class="main_background w-full h-svh flex justify-center items-center">
    <div class="primary_font text-white">
        <div class="flex relative">
            <h1 class="text-5xl p-0 w-full">{header}</h1>
            <input class="w-full absolute left-0 text-5xl bg-transparent p-0" bind:value={header} />
        </div>
        <div class="bg-primary">

        </div>
    </div>
</main>

