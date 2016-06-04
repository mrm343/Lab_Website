var _, advancedEditor, authorship, basicEditor, cursorManager;

_ = Quill.require('lodash');

advancedEditor = new Quill('.advanced-wrapper .editor-container', {
  modules: {
    'authorship': {
      authorId: 'advanced',
      enabled: true
    },
    'toolbar': {
      container: '.advanced-wrapper .toolbar-container'
    },
    'link-tooltip': true,
    'image-tooltip': true,
    'multi-cursor': true
  },
  styles: false,
  theme: 'snow'
});

authorship = advancedEditor.getModule('authorship');

authorship.addAuthor('basic', 'rgba(255,153,51,0.4)');


// build a new rich text editor for the news editing
advancedEditor2 = new Quill('.advanced-wrapper2 .editor-container2', {
  modules: {
    'authorship': {
      authorId: 'advanced',
      enabled: true
    },
    'toolbar': {
      container: '.advanced-wrapper2 .toolbar-container2'
    },
    'link-tooltip': true,
    'image-tooltip': true,
    'multi-cursor': true
  },
  styles: false,
  theme: 'snow'
});

authorship2 = advancedEditor2.getModule('authorship');

authorship2.addAuthor('basic', 'rgba(255,153,51,0.4)');
// cursorManager = advancedEditor.getModule('multi-cursor');

// cursorManager.setCursor('basic', 0, 'basic', 'rgba(255,153,51,0.9)');

advancedEditor3 = new Quill('.advanced-wrapper3 .editor-container3', {
  modules: {
    'authorship': {
      authorId: 'advanced',
      enabled: true
    },
    'toolbar': {
      container: '.advanced-wrapper3 .toolbar-container3'
    },
    'link-tooltip': true,
    'image-tooltip': true,
    'multi-cursor': true
  },
  styles: false,
  theme: 'snow'
});

authorship3 = advancedEditor3.getModule('authorship');

authorship3.addAuthor('basic', 'rgba(255,153,51,0.4)');

advancedEditor4 = new Quill('.advanced-wrapper4 .editor-container4', {
  modules: {
    'authorship': {
      authorId: 'advanced',
      enabled: true
    },
    'toolbar': {
      container: '.advanced-wrapper4 .toolbar-container4'
    },
    'link-tooltip': true,
    'image-tooltip': true,
    'multi-cursor': true
  },
  styles: false,
  theme: 'snow'
});

authorship4 = advancedEditor4.getModule('authorship');

authorship4.addAuthor('basic', 'rgba(255,153,51,0.4)');

advancedEditor5 = new Quill('.advanced-wrapper5 .editor-container5', {
  modules: {
    'authorship': {
      authorId: 'advanced',
      enabled: true
    },
    'toolbar': {
      container: '.advanced-wrapper5 .toolbar-container5'
    },
    'link-tooltip': true,
    'image-tooltip': true,
    'multi-cursor': true
  },
  styles: false,
  theme: 'snow'
});

authorship5 = advancedEditor5.getModule('authorship');

authorship5.addAuthor('basic', 'rgba(255,153,51,0.4)');

advancedEditor6 = new Quill('.advanced-wrapper6 .editor-container6', {
  modules: {
    'authorship': {
      authorId: 'advanced',
      enabled: true
    },
    'toolbar': {
      container: '.advanced-wrapper6 .toolbar-container6'
    },
    'link-tooltip': true,
    'image-tooltip': true,
    'multi-cursor': true
  },
  styles: false,
  theme: 'snow'
});

authorship6 = advancedEditor6.getModule('authorship');

authorship6.addAuthor('basic', 'rgba(255,153,51,0.4)');
