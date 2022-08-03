import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'
import Typography from '@tiptap/extension-typography'
import CharacterCount from '@tiptap/extension-character-count'
import type { ActionButton, Commandable } from './tiptap-actions'
import { Extras, Marks, Nodes } from './tiptap-actions'

let refs: {
  editorReference: HTMLElement
}

let editor: Editor

/**
 * Tiptap editor
 * @param {HTMLElement} editorReference
 *
 * Helped with: https://github.com/ueberdosis/tiptap/issues/1515#issuecomment-903095273
 */
const tiptap = () => ({
  content: '<p>This is where the content goes</p>',
  actions: [] as ActionButton[],
  updatedAt: Date.now(),
  $wire: {
    content: '',
  },
  init() {
    // eslint-disable-next-line @typescript-eslint/prefer-ts-expect-error
    // @ts-ignore - this is a reference to the Alpine data object
    refs = this.$refs

    editor = new Editor({
      element: refs.editorReference,
      extensions: [
        StarterKit,
        Typography,
        // CharacterCount.configure({
        //   limit: this.limit,
        // }),
        CharacterCount,
      ],
      content: this.content,
      onCreate: () => {
        this.updatedAt = Date.now()
        this.content = editor.getHTML()
        this.$wire.content = this.content
      },
      onUpdate: ({ editor }) => {
        this.updatedAt = Date.now()
        this.content = editor.getHTML()
        this.$wire.content = this.content
      },
      onTransaction: () => {
        this.updatedAt = Date.now()
      },
    })

    this.actions = [
      Marks.bold,
      Marks.italic,
      Marks.strike,
      Marks.code,
      Nodes.h1,
      Nodes.h2,
      Nodes.h3,
      Extras.seperator,
      Nodes.codeBlock,
      Nodes.blockquote,
      Nodes.bulletList,
      Nodes.orderedList,
      Nodes.hardBreak,
      Nodes.horizontalRule,
      Nodes.hardBreak,
      Extras.seperator,
      Extras.clearFormat,
      Extras.redo,
      Extras.undo,
    ]
  },
  isActive(action: ActionButton) {
    return editor.isActive(action.command, action.params)
  },
  command(action: ActionButton) {
    const command = action.command

    const methods: Commandable = {
      bold: editor.chain().toggleBold().focus(),
      italic: editor.chain().toggleItalic().focus(),
      strike: editor.chain().toggleStrike().focus(),
      code: editor.chain().toggleCode().focus(),
      highlight: undefined,
      link: undefined,
      subscript: undefined,
      superscript: undefined,
      textstyle: undefined,
      underline: undefined,
      blockquote: editor.chain().focus().toggleBlockquote(),
      bulletList: editor.chain().focus().toggleBulletList(),
      codeBlock: editor.chain().focus().toggleCodeBlock(),
      document: undefined,
      emoji: undefined,
      hardBreak: undefined,
      hashtag: undefined,
      heading: undefined,
      h1: undefined,
      h2: undefined,
      h3: undefined,
      h4: undefined,
      h5: undefined,
      h6: undefined,
      horizontalRule: undefined,
      image: undefined,
      mention: undefined,
      orderedList: undefined,
      paragraph: undefined,
      table: undefined,
      tableRow: undefined,
      tableCell: undefined,
      taskList: undefined,
      taskItem: undefined,
      text: undefined,
      youTube: undefined,
      clearFormat: undefined,
      undo: editor.chain().focus().undo(),
      redo: editor.chain().focus().redo(),
      seperator: undefined,
    }

    const method = methods[command]
    if (method)
      return method.run()

    return method
  },
  countCharacters() {
    return editor.storage.characterCount.characters()
  },
  countWords() {
    return editor.storage.characterCount.words()
  },
})

export default tiptap
