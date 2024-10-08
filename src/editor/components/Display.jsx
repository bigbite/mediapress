const { PluginPostStatusInfo } = wp.editPost;
const { __ } = wp.i18n;

const SamplePlugin = () => {
  return (
    <PluginPostStatusInfo className="edit-post-post-schedule">
      <p>{__('This is a JavaScript i18n string', 'mydomain')}</p>
    </PluginPostStatusInfo>
  );
};

export default SamplePlugin;
