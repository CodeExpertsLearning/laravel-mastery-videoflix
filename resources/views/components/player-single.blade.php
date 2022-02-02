@props(['video'])
<div>
    <div id="player"></div>

    @push('head')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@clappr/player@latest/dist/clappr.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/clappr.level-selector/latest/level-selector.min.js"></script>

        <style>
            /* https://github.com/clappr/clappr/issues/402#issuecomment-561549413 */
            /* Fix the player container to take up 100% width and to calculate its height based on its children. */
            [data-player] {
                position: relative;
                width: 100vw;
                height: 100vh;
                margin: 0;
            }
            /* Fix the video container to take up 100% width and to calculate its height based on its children. */
            [data-player] .container[data-container] {
                width: 100vw;
                height: 100vh;
                position: relative;
            }
            /* Fix the media-control element to take up the entire size of the player. */
            [data-player] .media-control[data-media-control] {
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
            }
            /* Fix the video element to take up 100% width and to calculate its height based on its natural aspect ratio. */
            [data-player] video {
                position: relative;
                display: block;
                width: 100vw;
                height: 100vh;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            var player = new Clappr.Player({
                source: "{{url('resources/' . $video['code'] . '/' . $video['processed_video'])}}",
                width: "100%",
                height: "auto",
                parentId: "#player",
                mimeType: "application/x-mpegURL",
                plugins: {"core": [LevelSelector]}
            });
        </script>
    @endpush
</div>
