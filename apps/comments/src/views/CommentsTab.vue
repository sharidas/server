<!--
  - @copyright Copyright (c) 2020 John Molakvoæ <skjnldsv@protonmail.com>
  -
  - @author John Molakvoæ <skjnldsv@protonmail.com>
  -
  - @license GNU AGPL version 3 or any later version
  -
  - This program is free software: you can redistribute it and/or modify
  - it under the terms of the GNU Affero General Public License as
  - published by the Free Software Foundation, either version 3 of the
  - License, or (at your option) any later version.
  -
  - This program is distributed in the hope that it will be useful,
  - but WITHOUT ANY WARRANTY; without even the implied warranty of
  - MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  - GNU Affero General Public License for more details.
  -
  - You should have received a copy of the GNU Affero General Public License
  - along with this program. If not, see <http://www.gnu.org/licenses/>.
  -
  -->

<template>
	<div :class="{ 'icon-loading': loading }">
		<!-- error message -->
		<div v-if="error" class="emptycontent">
			<div class="icon icon-error" />
			<h2>{{ error }}</h2>
		</div>

		<!-- comments -->
		<template v-else>
			<EmptyContent icon="icon-comment">
				{{ t('comments', 'No comments yet, start the conversation!') }}
			</EmptyContent>
		</template>
	</div>
</template>

<script>
import Avatar from '@nextcloud/vue/dist/Components/Avatar'
import EmptyContent from '@nextcloud/vue/dist/Components/EmptyContent'
import axios from '@nextcloud/axios'

export default {
	name: 'CommentsTab',

	components: {
		Avatar,
		EmptyContent,
	},

	data() {
		return {
			error: '',
			loading: true,

			fileInfo: null,
			comments: [],
		}
	},

	computed: {
	},

	methods: {
		/**
		 * Update current fileInfo and fetch new data
		 * @param {Object} fileInfo the current file FileInfo
		 */
		async update(fileInfo) {
			this.fileInfo = fileInfo
			this.resetState()
			this.getShares()
		},

		/**
		 * Get the existing shares infos
		 */
		async getComments() {
			try {
				this.loading = true

				// Fetch comments

			} catch (error) {
				this.error = t('comments', 'Unable to load the comments list')
				console.error('Error loading the comments list', error)
			} finally {
				this.loading = false
			}
		},

		/**
		 * Reset the current view to its default state
		 */
		resetState() {
			this.loading = true
			this.error = ''
			this.comments = []
		},
	},
}
</script>
