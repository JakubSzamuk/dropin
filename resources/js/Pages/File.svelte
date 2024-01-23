<script lang="ts">

    $: header = "New File";
    $: usePassword = false;

    let password = "";
    let file_body = "";

    const handle_save = () => {

    };
</script>

<main class="main_background w-full min-h-svh flex flex-col items-center text-white primary_font">
    <div class="w-2/5 min-h-svh pt-36">
        <input class="min-w-1/4 text-5xl bg-transparent" value={header || "New file"} on:change={(e) => header = e.target.value} />
        <textarea class="w-full p-4 rounded-md primary_bg min-h-[700px] bg-transparent resize-none" bind:value={file_body} />
        <div class="flex items-center mt-2 text-2xl">
            <p>Save as:</p>
            <button class="ml-auto mr-4 px-4 py-2 rounded-full primary_bg text-white primary_font" on:click={() => usePassword = true}>Secret</button>
            <button class="px-4 py-2 rounded-full primary_bg text-white primary_font">Public</button>
        </div>
    </div>
    {#if usePassword}
        <div class="w-full h-full flex justify-center items-center absolute top-0">
            <div class="w-1/5 dark_bg rounded-md px-8 py-6">
                <p class="mb-2">Enter a password</p>
                <div class="flex relative items-center">
                    <input bind:value={password} class="w-full p-4 rounded-full primary_bg" placeholder="password" type="password" />
                    <button class="ml-auto mr-4 px-4 py-2 rounded-full primary_bg text-white primary_font absolute right-0">Save</button>
                </div>
            </div>
        </div>
    {/if}
</main>

