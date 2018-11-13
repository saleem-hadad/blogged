<template>
  <div class="image-cropper">
    <div v-if="dataUrl" class="image-cropper-overlay">
      <div class="image-cropper-mark"><a href="javascript:;" class="image-cropper-close" @click="destroy">&times;</a></div>
      <div class="image-cropper-container">
        <div class="image-cropper-image-container">
          <img ref="img" :src="dataUrl" alt="" @load.stop="createCropper" />
        </div>
        <div class="image-cropper-footer">
          <button class="image-cropper-btn" @click="destroy" v-text="labels.cancel">Cancel</button>
          <button class="image-cropper-btn" @click="submit" v-text="labels.submit">Upload</button>
        </div>
      </div>
    </div>
    <input ref="input" type="file" class="image-cropper-img-input" :accept="mimes">
  </div>
</template>

<script>
  import Cropper from 'cropperjs'
  import 'cropperjs/dist/cropper.css'

  export default {
    props: {
      trigger: {
        type: [String, Element],
        required: true
      },
      uploadHandler: {
        type: Function,
      },
      uploadUrl: {
        type: String,
      },
      uploadHeaders: {
        type: Object,
      },
      uploadFormName: {
        type: String,
        default: 'file'
      },
      uploadFormData: {
        type: Object,
        default() {
          return {}
        }
      },
      cropperOptions: {
        type: Object,
        default() {
          return {
            autoCropArea: 1,
            viewMode: 1,
            movable: false,
            zoomable: false,
          }
        }
      },
      outputOptions: {
        type: Object,
        default() {
          return {
            width: 1920,
            height: 1080
          }
        }
      },
      outputMime: {
        type: String,
        default: 'image/jpeg'
      },
      outputQuality: {
        type: Number,
        default: 0.9
      },
      mimes: {
        type: String,
        default: 'image/png, image/gif, image/jpeg, image/svg'
      },
      labels: {
        type: Object,
        default() {
          return {
            submit: "Update",
            cancel: "Cancel"
          }
        }
      }
    },
    data() {
      return {
        cropper: undefined,
        dataUrl: undefined,
        filename: undefined
      }
    },
    methods: {
      destroy() {
        this.cropper.destroy()
        this.$refs.input.value = '';
        this.dataUrl = undefined
      },
      submit() {
        this.$emit('submit')
        if (this.uploadUrl) {
          this.uploadImage()
        } else if (this.uploadHandler) {
          this.uploadHandler(this.cropper)
        } else {
          this.$emit('error', 'No upload handler found.', 'user')
        }
        this.destroy()
      },
      pickImage() {
        this.$refs.input.click()
      },
      createCropper() {
        this.cropper = new Cropper(this.$refs.img, this.cropperOptions)
      },
      uploadImage() {
        this.cropper.getCroppedCanvas(this.outputOptions).toBlob((blob) => {          
          let formData = new FormData();

          formData.append(this.uploadFormName, blob);

          axios.post(this.uploadUrl, formData, {headers: {'Content-Type': 'multipart/form-data'}})
            .then((response) => {
              this.$emit('uploaded', response.data.url)
            });

        }, this.outputMime, this.outputQuality)
      }
    },
    mounted() {
      // listen for click event on trigger
      let trigger = typeof this.trigger == 'object' ? this.trigger : document.querySelector(this.trigger)
      if (!trigger) {
        this.$emit('error', 'No image make trigger found.', 'user')
      } else {
        trigger.addEventListener('click', this.pickImage)
      }

      // listen for input file changes
      let fileInput = this.$refs.input
      fileInput.addEventListener('change', () => {
        if (fileInput.files != null && fileInput.files[0] != null) {
          let reader = new FileReader()
          reader.onload = (e) => {
            this.dataUrl = e.target.result
          }

          reader.readAsDataURL(fileInput.files[0])

          this.filename = fileInput.files[0].name || 'unknown'
          this.$emit('changed', fileInput.files[0], reader)
        }
      })
    }
  }
</script>

<style lang="scss">
  .image-cropper {
    .image-cropper-overlay {
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      position: fixed;
      top:0;
      left:0;
      right:0;
      bottom:0;
      z-index: 99999;
    }

    .image-cropper-img-input {
      display: none;
    }

    .image-cropper-close {
      float: right;
      padding: 20px;
      font-size: 3rem;
      color: #fff;
      font-weight: 100;
      text-shadow: 0px 1px rgba(40, 40, 40,.3);
    }

    .image-cropper-mark {
      position: fixed;
      top:0;
      left:0;
      right:0;
      bottom:0;
      background: rgba(0, 0, 0, .10);
    }

    .image-cropper-container {
      background: #fff;
      z-index: 999;
      box-shadow: 1px 1px 5px rgba(100, 100, 100, .14);

      .image-cropper-image-container {
        position: relative;
        max-width: 400px;
        height: 300px;
      }
      img {
        max-width: 100%;
        height: 100%;
      }

      .image-cropper-footer {
        display: flex;
        align-items: stretch;
        align-content: stretch;
        justify-content: space-between;

        .image-cropper-btn {
          width: 50%;
          padding: 15px 0;
          cursor: pointer;
          border: none;
          background: transparent;
          outline: none;
          &:hover {
            background-color: #ab3f61;
            color: #fff;
          }
        }
      }
    }
  }
</style>